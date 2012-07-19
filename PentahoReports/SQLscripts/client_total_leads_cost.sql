-- total leads cost --

select
    round(sum(act1.vendor_conversions * act1.current_rate),2) as leads_cost,
    act2.partner_component_id
from 
    aggregate_campaign_transactions as act2
    join aggregate_campaign_transactions as act1
    on act1.campaign_id = act2.campaign_id and act2.aggregate_date = act1.aggregate_date
where
    act2.vertical_id = ${input_vertical_id}
    and act2.aggregate_date between ${input_from_date} AND ${input_to_date}
    and act2.partner_component_type_id = 2 -- client
    and act1.partner_component_type_id  = 1 -- vendor
    /* if input_partner_compnent_id is not null, then partner_component_id = input_partner_component_id*/
    and (${input_partner_component_id} is null OR act2.partner_component_id = ${input_partner_component_id})
group by 
act2.partner_component_id