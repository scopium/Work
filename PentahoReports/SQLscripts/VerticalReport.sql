-- Vertical Reporting --

select 
    act1.vertical_name as 'Vertical Name',
    act1.vertical_id,
    sum(act1.client_conversions) as 'Sales',
    sum(act1.client_conversions * act1.current_rate) as 'Total Sales Revenue',
    sum(act2.vendor_conversions * act2.current_rate) as 'Cost',
    (sum(act1.client_conversions * act1.current_rate) - sum(act2.vendor_conversions * act2.current_rate))/sum(act2.vendor_conversions * act2.current_rate)  as 'Profit Margin'
from
    aggregate_campaign_transactions as act1 -- client

join aggregate_campaign_transactions as act2 -- vendor
    on act1.campaign_id = act2.campaign_id 
and act1.aggregate_date = act2.aggregate_date
where 
    act1.aggregate_date = curdate() 
    and act1.partner_component_type_id = 2 -- client
and act2.partner_component_type_id = 1  -- vendor
group by 
act1.vertical_id;


