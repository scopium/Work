-- client lead reporting --

select 
    lt.transaction_timestamp  as 'Date',
    l.campaign_id as 'Campaign',
    l.subid as 'Subid',
    pd.lname as 'Last Name',
    pd.fname as 'First Name',
    pd.email as 'Email',
    pd.address as 'Address',
    pd.zip as 'Zip',
    pd.day_phone as 'Day Phone',
    pd.work_phone as 'Work Phone',
    pd.cell_phone as 'Cell Phone',
    pd.contact_time as 'Contact Time',
    lt.lead_ip_address as 'IP Address',
    l.lead_id as 'Lead ID',
    pd.comments as 'Comments',
    lt.destination_partner_component_id as 'Client ID',
    lt.source_partner_component_id as 'Vendor ID',
    pc.partner_component_name as 'Vendor Name'
from
    leads as l
    	inner join
    person_details as pd ON l.lead_id = pd.lead_id
    	inner join
    lead_transactions as lt ON l.lead_id = lt.lead_id and lt.third_party_response_system_code = '000' /*** successful leads **/
    AND lt.person_detail_id = pd.person_detail_id
    	inner join     
    cti_common.partner_components AS pc ON lt.source_partner_component_id = pc.partner_component_id
    	join 
    cti_common.partner_components AS pc_dest ON lt.destination_partner_component_id = pc_dest.partner_component_id
     join 
    aggregate_campaign_subid_transactions as acst on acst.campaign_id = l.campaign_id and acst.subid = l.subid
where
    (${input_partner_component_id} is null OR lt.destination_partner_component_id = ${input_partner_component_id})
    and (${input_campaign_id} is null OR l.campaign_id = ${input_campaign_id})
    and (${input_subid} is null OR l.subid = ${input_subid})
    and DATE(lt.transaction_timestamp) between ${input_from_date} AND ${input_to_date}

     /** Only get the vendors and clients that are active**/
     and pc.is_active = 1
     and pc_dest.is_active = 1
     and lt.destination_partner_component_id <> lt.source_partner_component_id 
     and acst.client_conversions >=1
group by l.lead_id , pd.person_detail_id
ORDER BY pc.partner_component_id , lt.transaction_timestamp DESC , pd.lead_id DESC
