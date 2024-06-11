<nav>
    <div class="logo">
        <h1>MyBus App</h1>
    </div>
    <div class="nav-menu">
        <ul>
            <?php if($userRole === 'user'): ?>
            <li><a class="nav-link" href="#">My Bookings</a></li>
            <?php endif; ?>
        </ul>
        <ul>
            <?php if($isAuth): ?>
                <li><a class="nav-link" href="user">Dashboard</a></li>
                <li><a class="nav-link" href="user">Profile</a></li>
                <li><a class="nav-link" href="../logout.php">Logout</a></li>
            <?php else: ?>
                <li><a class="nav-link" href="login.php">Login</a></li>
                <li><a class="nav-link" href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>