<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './model/classAbstractDAO.php';
require './model/classDAOUsuarios.php';
require './model/classModel.php';
require './model/classUsuarios.php';

$dao = new DAOUsuarios;

var_dump( $dao->SELECT( array ('email' => 'viniciusnw@hotmail.com') ) );