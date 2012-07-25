/* rate history --
--note: bob still needs to modify the query or tables to make it full proof at media vendor leve --
-- this is best done in a stored procedure */

SELECT 
	CASE pc.partner_component_type_id 
		WHEN 1 -- vendor
			THEN ccd.unit_cost
		WHEN 2 -- client
			THEN ccd.unit_price
		ELSE 0
	END AS current_rate
	, ccd.campaign_client_start_date AS rate_date
FROM cti_common.campaign_client_details AS ccd
JOIN cti_common.partner_components AS pc
	ON pc.partner_component_id = ${input_partner_component_id} 
JOIN cti_common.campaign_clients AS cc
	ON cc.campaign_client_id = ccd.campaign_client_id
	AND cc.partner_component_id = 	CASE pc.partner_component_type_id 
						WHEN 2 -- client
							THEN pc.partner_component_id
						ELSE cc.partner_component_id
					END
JOIN cti_common.campaigns AS c
	ON c.campaign_id = cc.campaign_id
       and (${input_campaign_id} is null OR c.campaign_id = ${input_campaign_id})
	AND c.partner_component_id = 	CASE pc.partner_component_type_id 
						WHEN 1 -- vendor
							THEN pc.partner_component_id
						ELSE c.partner_component_id
					END
WHERE 
pc.vertical_id = ${input_vertical_id}
AND ccd.campaign_client_start_date BETWEEN ${input_from_date} AND ${input_to_date}
GROUP BY current_rate, ccd.campaign_client_start_date
ORDER BY ccd.campaign_client_start_date DESC;