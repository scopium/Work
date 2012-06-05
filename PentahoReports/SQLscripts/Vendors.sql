select 
sum(first_page_impressions) as clicks,
sum(first_page_submits) as first_page_submits,
sum(vendor_conversions) as vendor_conversions,
sum(pixel_conversions) as pixel,
sum(vendor_conversions * current_rate) as lead_cost,
sum(first_page_submits) / sum(first_page_impressions) as pri_c2c,
vertical_id,
partner_component_id,
partner_component_name,
campaign_name,
campaign_id,
vertical_name,
account_manager_name,
account_manager_id
from
aggregate_campaign_transactions_TEST
where 
vertical_id = ${input_vertical_id}
and partner_component_type_id = 1
group by 
partner_component_id