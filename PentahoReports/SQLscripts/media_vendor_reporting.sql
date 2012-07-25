-- media vendor reporting --
select 
sum(act1.first_page_impressions) as "Clicks (Imp)",
sum(act1.first_page_submits) as "First Page Submits",
sum(act1.vendor_conversions) as "Vendor Conversions",
sum(act1.pixel_conversions) as "Pixel",
sum(act1.vendor_conversions * act1.current_rate) as "Lead Cost",
round(avg(act1.current_rate),2) as "Avg. CPL",
act1.vertical_id,
act1.partner_component_id as "Client ID",
act1.partner_component_name as "Media Vendor",
act1.campaign_name as "Campaign Name",
act1.campaign_id as "Campaign ID",
act1.vertical_name as "Vertical Name",
CONCAT(LEFT(act1.account_manager_name, INSTR(act1.account_manager_name,' ')), SUBSTRING(act1.account_manager_name, INSTR(act1.account_manager_name, ' ') + 1, 1)) as "Account Manager",
act1.account_manager_id,
-- this is related to the left join being done, since we may get null values and dont want to retreive null.
sum(ifnull(act2.client_conversions,0)) as "Client Conversions",
sum(ifnull(act2.client_conversions * act2.current_rate,0)) as "Total Sales Revenue",
bm.billing_method_name as "Billing Method"
from
aggregate_campaign_transactions as act1

/** the following joins to get the billing method should be moved to the aggregate table eventually **/
inner join cti_common.campaign_clients as cc 
on act1.campaign_id = cc.campaign_id 
inner join cti_common.campaign_client_details as ccd 
on ccd.campaign_client_id = cc.campaign_client_id 
inner join cti_common.billing_methods as bm 
on bm.billing_method_id = ccd.source_billing_method_id
/** end of joins to get the billing method **/
AND act1.aggregate_date between ccd.campaign_client_start_date and ccd.campaign_client_end_date 
left join aggregate_campaign_transactions as act2 
/** as a rule of thumb is always better to join on at least 2 parameters when joining the same table **/
on 
act1.campaign_id = act2.campaign_id 
and act1.aggregate_date = act2.aggregate_date
-- adding this to the left join is like doing another join without actually joing
and act2.partner_component_type_id = 2
where
act1.vertical_id = ${input_vertical_id}
and act1.aggregate_date between ${input_from_date} AND ${input_to_date}
and act1.partner_component_type_id = 1
 /* if input_partner_compnent_id is not null, then partner_component_id = input_partner_component_id*/
and (${input_partner_component_id} is null OR act1.partner_component_id = ${input_partner_component_id})
and act1.account_manager_id =  
CASE WHEN INSTR(${user_roles}, 'qa') > 0
OR INSTR(${user_roles}, 'director') > 0
OR INSTR(${user_roles}, 'Admin') > 0
OR INSTR(${user_roles}, 'mvdh') > 0
OR INSTR(${user_roles}, 'cmdh') > 0
THEN
    act1.account_manager_id
	
	ELSE
	(select distinct(ac.account_manager_id) from cti_common.users as u
join cti_common.account_managers as ac on ac.employee_id = u.employee_id
join report.aggregate_campaign_subid_transactions as act on act.account_manager_id = ac.account_manager_id
where u.email like ${logged_in_user})
	END
group by 
act1.partner_component_name asc


