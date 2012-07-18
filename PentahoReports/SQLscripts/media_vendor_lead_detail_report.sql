-- media lead reporting --
select 
    lt.transaction_timestamp as 'Date',
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
	-- This equlality means: as soon as the person detail record gets inserted , everything before it meaning the lead transaction gets updated
     -- also. Thus we check the person_detail_id of both tables to make sure they both exist for the record.
    lead_transactions as lt ON l.lead_id = lt.lead_id AND lt.person_detail_id = pd.person_detail_id
        inner join
    cti_common.partner_components AS pc ON lt.source_partner_component_id = pc.partner_component_id
        join
    cti_common.partner_components AS pc_dest ON lt.destination_partner_component_id = pc_dest.partner_component_id
        join
    aggregate_campaign_subid_transactions as acst ON acst.campaign_id = l.campaign_id and acst.subid = l.subid
        join
    -- joining processing units and making sure the element is a processing unit with the packet type of enter(1) which means first page submit successful (5)
    -- this query join will change later
    config.elements as e ON e.element_id = lt.element_id and e.element_type_id = 5 and lt.packet_type_id = 1
where
    (${input_partner_component_id} is null OR lt.source_partner_component_id = ${input_partner_component_id})
    and (${input_campaign_id} is null OR l.campaign_id = ${input_campaign_id})
    and (${input_subid} is null OR l.subid = ${input_subid})
    and DATE(lt.transaction_timestamp) between ${input_from_date} AND ${input_to_date}
    -- Only get the vendors and clients that are active
    and pc.is_active = 1 and pc_dest.is_active = 1 and lt.destination_partner_component_id <> lt.source_partner_component_id 
-- grouping by person detail because we want to show all the leads that have info.. not just valid lead (active)
group by l.lead_id , pd.person_detail_id
ORDER BY pc.partner_component_id , lt.transaction_timestamp DESC , pd.lead_id DESC