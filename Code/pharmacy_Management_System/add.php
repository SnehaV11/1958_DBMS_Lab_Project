<?php
session_start();
include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
} else {
    $action = $_REQUEST['action'] ?? '';

    if ( 'addManager' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        if ( $fname && $lname && $lname && $phone && $password ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO managers(fname,lname,email,phone,password) VALUES ('{$fname}','$lname','$email','$phone','$hashPassword')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allManager" );
        }

    } elseif ( 'addPharmacist' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        if ( $fname && $lname && $lname && $phone && $password ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO pharmacists(fname,lname,email,phone,password) VALUES ('{$fname}','$lname','$email','$phone','$hashPassword')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allPharmacist" );
        }
    } else {
            echo mysqli_error( $connection );
        }
    }
