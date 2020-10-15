<header>
	<div class="account-name">Account: <?php echo $_SESSION['email'] ?></div>
	<div class="logout">
		<a href="?action=logout" style="text-decoration: none;">
			<button class="btn-logout btn-dark" type="button" name="logout">
				Logout
			</button>
		</a>
	</div>
</header>