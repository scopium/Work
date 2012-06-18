    /* zipcodes not showing up in lead report*/
    /* view the following query, notice the results, for empty fields there are still a first page submit*/

    /* is there any other way to check for first page submit other than aggregate table?*/
    /** also there are empty leads as well as mis association of subid to the lead*/
    select 
        lt.created_date as 'Date',
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
        pc.partner_component_name as 'Vendor Name',
        acst.first_page_submits
    from
        leads as l
            inner join
        person_details as pd ON l.person_id = pd.person_id
         join persons as p on pd.person_id = pd.person_id
            inner join
        lead_transactions as lt ON l.lead_id = lt.lead_id
            inner join     
        cti_common.partner_components AS pc ON lt.source_partner_component_id = pc.partner_component_id
            join 
        cti_common.partner_components AS pc_dest ON lt.destination_partner_component_id = pc_dest.partner_component_id

         join aggregate_campaign_subid_transactions as acst on acst.campaign_id = l.campaign_id
    where
        /*(${input_partner_component_id} is null OR lt.source_partner_component_id = ${input_partner_component_id})
        and (${input_campaign_id} is null OR l.campaign_id = ${input_campaign_id})    
        and (${input_subid} is null OR l.subid = ${input_subid})*/
          lt.created_date between '2012-06-15' AND DATE_ADD('2012-06-15', INTERVAL 1 DAY)
         /** Only get the vendors and clients that are active**/
         and pc.is_active = 1
         and pc_dest.is_active = 1
         and p.is_active = 1
         and lt.destination_partner_component_id <> lt.source_partner_component_id 
         and acst.first_page_submits >= 1
    group by l.lead_id
    order by pc.partner_component_id, lt.created_date desc;



    /********/
    /*** 184is a lead id retreived from the lead detail query*/
    SELECT * FROM report.leads where lead_id = 184;
    /* person_id is retrieved from the results of the above query*/
    SELECT * FROM report.persons where person_id = 110;
    /*** there are multiple records in the person_id .. why? do we need to take the latest record, why would the first record
    be empty in the first place*/
    select * from person_details where person_id = 110;
