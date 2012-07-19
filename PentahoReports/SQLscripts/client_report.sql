-- client reporting --

select 
    partner_component_name as 'Client',
    partner_component_id as 'Client ID',
    account_manager_name as 'Account Manager',
    round(current_rate,2) as 'Current Sale Price',
    sum(client_conversions) as 'Sales',
    sum(client_conversions) * current_rate as 'Total Sales Revenue',
    vertical_id,
    vertical_name as 'Vertical Name',
    account_manager_id,
    sum(failed_posts) as 'Failed Posts'
from
    aggregate_campaign_transactions
where 
    vertical_id = ${input_vertical_id}
    and aggregate_date between ${input_from_date} AND ${input_to_date}
    and partner_component_type_id = 2
/* if input_partner_compnent_id is not null, then partner_component_id = input_partner_component_id*/
    and (${input_partner_component_id} is null OR partner_component_id = ${input_partner_component_id})
    and account_manager_id =  
        CASE WHEN INSTR(${user_roles}, 'qa') > 0
        OR INSTR(${user_roles}, 'director') > 0
        OR INSTR(${user_roles}, 'Admin') > 0
        OR INSTR(${user_roles}, 'mvdh') > 0
        OR INSTR(${user_roles}, 'cmdh') > 0
        THEN
            account_manager_id
            
            ELSE
            (select distinct(ac.account_manager_id) from cti_common.users as u
        join cti_common.account_managers as ac on ac.employee_id = u.employee_id
        join report.aggregate_campaign_transactions as act on act.account_manager_id = ac.account_manager_id
        where u.email like ${logged_in_user})
            END
group by 
partner_component_id