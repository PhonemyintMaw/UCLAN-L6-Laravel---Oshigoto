Oshigoto Japan — Job Application System
========================================

Student Name: Phone Myint Maw
Student ID / Registration: 200495 /  G21344079
Module Name: Information Systems Project
Module Leader: Steve Wade
Semester: ISP Autumn 2025
Submission Date: 30.11.2025



Minimum System Specifications
---------------------------------

Software Requirements

Operation System: Windows 10 (64 bit) or later
Web Server Environment: XAMPP (Apache + MySQL) version 7.4 or above
IDE: Any IDE but VSCode is preferred
PHP Version: PHP 8.1 or Later
Laravel Framework: Laravel 10
Browser: Any Modern Browser (Chrome, Edge, etc.)


Hardware Requirements

Processor (CPU): Dual-core processor (Intel or AMD)
Memory (RAM): Minimum 4 GB (8GB recommended for smoother installation)
Storage: At least 1 GB free space



Installation Steps
---------------------
1. Extract the "200495_Phone Myint Maw_ISP_Final Report_Autumn 2025" zip file and open the folder.

2. Open the folder named:
   200495_Phone Myint Maw_ISP Source Codes_Autumn 2025

3. Inside the folder, locate:
   200495_Phone_Myint_Maw_ISP_Project

   Put this folder inside your XAMPP 'htdocs' directory.

4. Open phpMyAdmin and create a database named:
   `oshigoto`.

5. Import the following database file:
   `oshigoto.sql` (Located in 200495_Phone Myint Maw_ISP Source Codes_Autumn 2025 Folder)

6. Open terminal inside the project folder: 
   200495_Phone_Myint_Maw_ISP_Project

   Then Run:
   composer install

7. After installing composer, 
   Run:
   php artisan serve

8. Access the project at:
   http://localhost:8000




Possible Fixes
---------------------

If uploaded files (images, PDFs, etc.) do not appear on the website, it may be due to a missing storage link.

To fix this:

1. Delete "storage" folder inside the "public" folder.

2. Open terminal in the project folder: 
   200495_Phone_Myint_Maw_ISP_Project

   And then run:
   php artisan storage:link

3. The files can now be accessible on the website.




Default Logins
-----------------
Admin Account:
  Email: admin@oshigoto.com
  Password: pmm552002


Partner Accounts:
  Email: mmtoshin@gmail.com  (Main Account used for testing)
  Password: toshin2025

  Email: Hikari@gmail.com  (Additional Account)
  Password: hikari2025

  Email: nihongo@gmail.com  (Additional Account)
  Password: nihon2025



