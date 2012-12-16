<?php 
	/*
	=======================
	PASSWORD HASHING
	=======================
	name   	: Tan Andre Kurniawan
	email  	: hackartz.dev@gmail.com
	git 	: github.com/hackartz
*/
	error_reporting(0); 
	/* 	mematikan error reporting 
		untuk lebih lanjut baca php configuration
		file di php.ini
	*/

	$salt = base64_encode('secret');
	/* 	tulisan secret bisa diganti dengan kata
		kunci lainnya.
		mengenkripsi plain text = 'secret'
		yang nanti akan ditambahkan pada password
		contoh : 'secret' + 'password'
			jadi : 'secretpassword'

		secret -> dienkripsi base64 algoritma
		Hal ini dilakukan untuk memperkuat keamanan
		password dari cracking
	*/
	$hashed_password = sha1($salt.$_POST['password']);
	/*	menggabungkan $salt dan $password dari 			method post kemudian di enkripsi dengan
		sha1('secretpassword')
	*/

	$username = $_POST['username'];
	$password = $hashed_password;

	$q = "select username,password from member where username='$username' and password='$password' limit 1";
	/* 	limit 1 akan menghasilkan hanya 1 baris data
		dari query (menghindari duplikasi)
		dan mempercepat waktu eksekusi
	*/

 ?>