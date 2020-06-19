EXEC INSERTLOANPROC @DEALER_ID = 12, @CARYEAR = 1999, @MAKE = "FORD" , @MODEL = "FLEX", @VIN= "ghfjritu576849rjf", @LOAN_AMOUNT = 4500;

SELECT apr_rate FROM loan l join vehicle v on l.vehicle_id = v.VEHICLE_ID where v.vehicle_id =1070 ;


update dealer
set dealer_score = 500
where dealer_id = 15
select * from dealer


select * from vehicle