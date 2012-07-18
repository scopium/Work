-- failed lead reporting --

SELECT 
    lt.transaction_timestamp AS 'Date',
    l.campaign_id AS 'Campaign',
    l.subid AS 'Subid',
    pd.lname AS 'Last Name',
    pd.fname AS 'First Name',
    pd.email AS 'Email',
    pd.address AS 'Address',
    pd.zip AS 'Zip',
    pd.day_phone AS 'Day Phone',
    pd.work_phone AS 'Work Phone',
    pd.cell_phone AS 'Cell Phone',
    pd.contact_time AS 'Contact Time',
    lt.lead_ip_address AS 'IP Address',
    l.lead_id AS 'Lead ID',
    pd.comments AS 'Comments',
    lt.destination_partner_component_id AS 'Client ID',
    lt.source_partner_component_id AS 'Vendor ID',
    pc.partner_component_name AS 'Vendor Name',
    cr.cti_response_status AS 'Status'
FROM
    leads AS l
        INNER JOIN
    person_details AS pd ON l.lead_id = pd.lead_id
        INNER JOIN
    lead_transactions AS lt ON l.lead_id = lt.lead_id AND lt.person_detail_id = pd.person_detail_id
        INNER JOIN
    cti_common.partner_components AS pc ON lt.source_partner_component_id = pc.partner_component_id
        INNER JOIN
    config.cti_responses AS cr ON lt.third_party_response_system_code = cr.cti_response_code
        JOIN
    cti_common.partner_components AS pc_dest ON lt.destination_partner_component_id = pc_dest.partner_component_id
        JOIN
    aggregate_campaign_subid_transactions AS acst ON acst.campaign_id = l.campaign_id AND acst.subid = l.subid
        JOIN
    /** join against table where the elemement is a successful submit (5) and the packet type is next (3) **/
    config.elements AS e ON e.element_id = lt.element_id AND e.element_type_id = 5 AND lt.packet_type_id = 3
WHERE
    (${input_partner_component_id} is null OR lt.destination_partner_component_id = ${input_partner_component_id})
    and (${input_campaign_id} is null OR l.campaign_id = ${input_campaign_id})    
    and (${input_subid} is null OR l.subid = ${input_subid})
    -- changed lt.created_date to lt.transaction_timestamp BC and concatenating for same day reports
    and DATE(lt.transaction_timestamp) between ${input_from_date} AND ${input_to_date}
    -- Only get the vendors and clients that are active
    and pc.is_active = 1 AND pc_dest.is_active = 1 
    -- 000 is not success and the party response is not null or 0
    AND lt.third_party_response_system_code != '000' AND CHAR_LENGTH(lt.third_party_response_system_code) > 0
GROUP BY l.lead_id , pd.person_detail_id
ORDER BY pc.partner_component_id , lt.transaction_timestamp DESC , pd.lead_id DESC