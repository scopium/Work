

/* Problem: First page submit not showing up*/
/* by looking at the record below, you'll notice that the first page submit is recorded under the lead purchaser 
where it should be recorded under the media vendor */
SELECT * FROM report.aggregate_campaign_transactions 
where aggregate_id in (50,51)
order by aggregate_date desc limit 2;