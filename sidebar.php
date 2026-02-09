<?php
/* Sidebar Navigation Menu for Pharmacy Management System */

function render_sidebar($user_role) {
    echo '<ul>';

    if ($user_role == 'admin') {
        echo '<li><a href="/dashboard">Dashboard</a></li>';
        echo '<li><a href="/manage-users">Manage Users</a></li>';
        echo '<li><a href="/manage-products">Manage Products</a></li>';
        echo '<li><a href="/reports">Reports</a></li>';
    } elseif ($user_role == 'pharmacist') {
        echo '<li><a href="/dashboard">Dashboard</a></li>';
        echo '<li><a href="/view-products">View Products</a></li>';
        echo '<li><a href="/view-prescriptions">View Prescriptions</a></li>';
    } elseif ($user_role == 'customer') {
        echo '<li><a href="/view-products">View Products</a></li>';
        echo '<li><a href="/view-prescriptions">View Prescriptions</a></li>';
        echo '<li><a href="/contact">Contact Us</a></li>';
    }

    echo '</ul>';
}
?>