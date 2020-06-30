# CSCI 3300 Software Engineering Final Project 


# About This Program

This program was written for a project in a software engineering class. It provided a way for a made up business to keep track of their auto loan portfolio. Once a banker is given a login for the program, he / she can be assigned dealerships to monitor, and keep track of. Loans that are entered in by a banker will be stored in a secure database, and cannot be deleted. 


# Getting Started

To get started, some technical knowledge is required. A user account will have to be created for any users that will need to access the platform. This can be done by executing the database’s stored procedure for adding accounts. (Detailed information for adding an account is in the technical unit) After a user account is created, the dealerships will need to be added to the database. Since the bank doesn't add or remove clients often, the feature to add or remove dealerships wasn't implemented in this release.

# Accounts

This software’s ability to have separate user accounts was one that was crucial to its development. To create an account, please refer to the technical area of the documentation. The following are the types of accounts that a user may have:

A supervisor account, denoted with a “Supervisor Level” tag at the top of the page is the highest level that a user can achieve. This means that the user is able to view all dealer profiles, and loans. 

An employee account is only able to view the dealerships that are assigned to the employee. To assign a dealership to an employee, please see the technical area of the documentation.

# Dealer Scoring

Each dealership is assigned a “Dealer Score”. This score is an internal prediction on how good the customer is with the company. The score ranges from 0 to 1000, and is comprised of several predictive factors such as past loan history, past loan amounts, past interest rate amounts, and vehicle years. 

For example: A dealership that finances an older car for $100,000 might not have a high dealer score. This is because the previous loan was not worth the loan amount. A dealer that is willing to finance an older car with a higher amount might not be the kind of dealer the company wants to finance more with.



# Navigation

Login Screen - This page allows the user to login to the platform.  Once a user logs in to the platform, the user is redirected to his/her user dashboard. 

Dashboard - This is the screen that shows the assigned dealerships for the user. If the user is a supervisor, then that user will be able to view all of the dealerships for the company. To add a new loan or view existing loans for a dealership, click on the buttons that are listed to the right of each dealer.

Create a Loan - This program allows a banker to create a loan for a particular dealership. Once the “create new loan” button is clicked, the dealership id and dealership name are pre-populated into the form. This leaves the banker to collect some information from the dealership. The bank will need to know what year, make, and model the loan is for, as well as the loan amount being requested. Once this form is submitted, the request will go into the system and will either be accepted or denied.

View Loans - Loan transaction history is easily accessible with the click of the View loans button on the users dashboard. Once this button is clicked, the user will be able to view the loans that were added to the database. Each loan is associated with a vehicle, and will list the loan information to the right of the vehicle information. 

Logout - User login data is session based. This means that the user can timeout of their logged in session if the user is inactive. If the user is logged out of their session, the user will be redirected to the login page upon refreshing the page. This is to ensure user security when browsing. To log out at any time, click the logout button at the top right of any page during the user’s session.



Return to Dashboard - On all forms and reports away from the dashboard there is an option to return to the user’s home. Doing such will abort the current process being done.




# Technical Unit

Security

### Database Credential Storage - 
All Passwords in the database are stored as hashes. No plain text passwords are kept. 

### Multi Level User Mode - 
This software has the ability to assign users different access levels. If the user is a supervisor, then the user will be able to see all of the dealerships in the database. 


# SQL Stored Procedures

In this program, all major processes are added as stored procedures in the database. This is to enhance the user experience, and minimize the time spent at the database.

Adding a user - To add a user to the program someone with sql credentials can add an account easily! 

### Procedure name - AddUserProc

Parameters
 @Username - varchar
 @Password - varchar 
@is_Supervisor - bit (optional defaults a 0)
0 for Employee
1 for Supervisor

### Get Assigned Dealers - This is used at the user’s dashboard to get a list of assigned dealerships for the user

Procedure Name - GetAssignedDealers

Parameters 
@User_ID - INT


### Get Loan Records - This is used in the view loans page to grab the loans for a dealership. 

Procedure Name - GetLoanRecordsProc

Parameters
@Dealer_ID - INT


### Insert Loan - This is used at the create a loan page to add a new loan to the system. 

Procedure Name -  InsertLoanProc

Parameters - 
@Make VARCHAR
@Model VARCHAR
@VIN VARCHAR(17)
@Loan_Amount MONEY
@CarYear INT
@Dealer_ID INT

