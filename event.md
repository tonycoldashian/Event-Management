SQL CODE:

1 . CREATE TABLE `event_management`.`customer1` (

`c_id` VARCHAR(20) NOT NULL,

`c_fname` VARCHAR(20) NOT NULL,

`c_lname` VARCHAR(25) NULL,

`c_add` VARCHAR(45) NOT NULL,

`c_username` VARCHAR(45) NOT NULL,

`c_password` VARCHAR(45) NOT NULL,

`c_discount` FLOAT NULL,

`c_mail_id` VARCHAR(45) NOT NULL,

UNIQUE INDEX `c_username_UNIQUE` (`c_username` ),

UNIQUE INDEX `c_mail_id_UNIQUE` (`c_mail_id` ),

UNIQUE INDEX `c_id_UNIQUE` (`c_id` ),

PRIMARY KEY (`c_id`))

  
  
CREATE TABLE `event_management`.`customer2` (

`c_phn` VARCHAR(11) NOT NULL,

`c_id1` VARCHAR(20) NOT NULL,

PRIMARY KEY (`c_id1`),

UNIQUE INDEX `c_id_UNIQUE` (`c_id1` ),

CONSTRAINT `c_id1`

FOREIGN KEY (`c_id1`)

REFERENCES `event_management`.`customer1` (`c_id`));



CREATE TABLE `event_management`.`employees1` (

`emp_id` VARCHAR(20) NOT NULL,

`emp_fname` VARCHAR(20) NOT NULL,

`emp_lname` VARCHAR(20) NULL,

`emp_add` VARCHAR(45) NOT NULL,

`emp_salary` DECIMAL(10) NOT NULL,

PRIMARY KEY (`emp_id`),

UNIQUE INDEX `emp_id_UNIQUE` (`emp_id` ));


CREATE TABLE `event_management`.`logistics` (

`workalloted` VARCHAR(30) NULL,

`emp_id4` VARCHAR(20) NOT NULL,

PRIMARY KEY (`emp_id4`),

CONSTRAINT `emp_id4`

FOREIGN KEY (`emp_id4`)

REFERENCES `event_management`.`employees1` (`emp_id`));



CREATE TABLE `event_management`.`performers` (

`per_id` VARCHAR(20) NOT NULL,

`per_fname` VARCHAR(20) NOT NULL,

`per_lname` VARCHAR(20) NULL,

`per_mail_id` VARCHAR(25) NOT NULL,

`per_add` VARCHAR(45) NOT NULL,

PRIMARY KEY (`per_id`),

UNIQUE INDEX `per_id_UNIQUE` (`per_id` ),

UNIQUE INDEX `per_mail_id_UNIQUE` (`per_mail_id` ));



CREATE TABLE `event_management`.`dancers` (

`forte` VARCHAR(40) NOT NULL,

`per_id4` VARCHAR(20) NOT NULL,

PRIMARY KEY (`per_id4`),

CONSTRAINT `per_id4`

FOREIGN KEY (`per_id4`)

REFERENCES `event_management`.`performers` (`per_id`));



CREATE TABLE `event_management`.`venue1` (

`v_id` VARCHAR(20) NOT NULL,

`v_name` VARCHAR(45) NOT NULL,

`capacity` BIGINT(20) NOT NULL,

`v_add` VARCHAR(45) NOT NULL,

`v_rent` FLOAT NOT NULL,

PRIMARY KEY (`v_id`),

UNIQUE INDEX `v_id_UNIQUE` (`v_id` ));

    
    
CREATE TABLE `event_management`.`venue2` (

`v_phn` VARCHAR(20) NOT NULL,

`v_id1` VARCHAR(20) NOT NULL,

PRIMARY KEY (`v_id1`),

CONSTRAINT `v_id`

FOREIGN KEY (`v_id1`)

REFERENCES `event_management`.`venue1` (`v_id`));

    
    
CREATE TABLE `event_management`.`managers` (

`department` VARCHAR(25) NOT NULL,

`emp_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`emp_id2`),

CONSTRAINT `emp_id2`

FOREIGN KEY (`emp_id2`)

REFERENCES `event_management`.`employees1` (`emp_id`));



CREATE TABLE `event_management`.`musician` (

`mus_type` VARCHAR(30) NOT NULL,

`per_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`per_id2`),

CONSTRAINT `per_id2`

FOREIGN KEY (`per_id2`)

REFERENCES `event_management`.`performers` (`per_id`));



CREATE TABLE `event_management`.`fillers` (

`fil_type` VARCHAR(30) NOT NULL,

`per_id5` VARCHAR(20) NOT NULL,

PRIMARY KEY (`per_id5`),

CONSTRAINT `per_id5`

FOREIGN KEY (`per_id5`)

REFERENCES `event_management`.`performers` (`per_id`));


CREATE TABLE `event_management`.`anchor` (

`gender` CHAR(1) NOT NULL,

`per_id3` VARCHAR(20) NOT NULL,

PRIMARY KEY (`per_id3`),

CONSTRAINT `per_id3`

FOREIGN KEY (`per_id3`)

REFERENCES `event_management`.`performers` (`per_id`));



CREATE TABLE `event_management`.`decoration` (

`d_type` VARCHAR(30) NOT NULL,

`charge` DECIMAL(10) NOT NULL,

PRIMARY KEY (`d_type`),

UNIQUE INDEX `d_type_UNIQUE` (`d_type` ))

    
    
CREATE TABLE `event_management`.`decorators` (

`dec_id` VARCHAR(20) NOT NULL,

`dec_add` VARCHAR(45) NOT NULL,

`dec_mail_id` VARCHAR(20) NOT NULL,

`dec_name` VARCHAR(45) NOT NULL,

`dec_type` VARCHAR(45) NOT NULL,

PRIMARY KEY (`dec_id`, `dec_type`),

UNIQUE INDEX `dec_id_UNIQUE` (`dec_id` ),

UNIQUE INDEX `dec_mail_id_UNIQUE` (`dec_mail_id` ),

INDEX `dec_type_idx` (`dec_type` ),

CONSTRAINT `dec_type`

FOREIGN KEY (`dec_type`)

REFERENCES `event_management`.`decoration` (`d_type`));

CREATE TABLE `event_management`.`transportation` (

`cost_per_km` FLOAT NOT NULL,

`no._of_seats` INT NOT NULL,

`v_name` VARCHAR(40) NOT NULL,

PRIMARY KEY (`v_name`));



CREATE TABLE `event_management`.`makeup` (

`m_type` VARCHAR(45) NOT NULL,

`m_charge` DECIMAL(10) NOT NULL,

PRIMARY KEY (`m_type`));



CREATE TABLE `event_management`.`parlour` (

`par_id` VARCHAR(20) NOT NULL,

`par_name` VARCHAR(45) NOT NULL,

`par_mail_id` VARCHAR(35) NOT NULL,

`par_add` VARCHAR(50) NOT NULL,

`makeup_m_type` VARCHAR(45) NOT NULL,

PRIMARY KEY (`par_id`),

INDEX `fk_parlour_makeup1_idx` (`makeup_m_type` ),

CONSTRAINT `makeup_m_type`

FOREIGN KEY (`makeup_m_type`)

REFERENCES `event_management`.`makeup` (`m_type`));



CREATE TABLE `event_management`.`food` (

`cost` DECIMAL NOT NULL,

`f_type` VARCHAR(45) NOT NULL,

PRIMARY KEY (`f_type`),

UNIQUE INDEX `f_type_UNIQUE` (`f_type` ));



CREATE TABLE `event_management`.`caterers` (

`cat_id` VARCHAR(20) NOT NULL,

`cat_name` VARCHAR(45) NOT NULL,

`cat_mail_id` VARCHAR(20) NOT NULL,

`cat_add` VARCHAR(45) NOT NULL,

PRIMARY KEY (`cat_id`),

UNIQUE INDEX `cat_mail_id_UNIQUE` (`cat_mail_id` ));



CREATE TABLE `event_management`.`Ecompany` (

`e_id` VARCHAR(20) NOT NULL,

`e_add` VARCHAR(45) NOT NULL,

`e_name` VARCHAR(45) NOT NULL,

`e_mail_id` VARCHAR(20) NOT NULL,

PRIMARY KEY (`e_id`),

UNIQUE INDEX `e_mail_id_UNIQUE` (`e_mail_id` ),

UNIQUE INDEX `e_add_UNIQUE` (`e_add` ));



CREATE TABLE `event_management`.`Elec_equip` (

`el_id` VARCHAR(20) NOT NULL,

`el_name` VARCHAR(45) NOT NULL,

`cost` DECIMAL(20) NOT NULL,

PRIMARY KEY (`el_id`),

UNIQUE INDEX `el_id_UNIQUE` (`el_id` ));



CREATE TABLE `event_management`.`photographers` (

`p_id` VARCHAR(20) NOT NULL,

`p_fname` VARCHAR(20) NOT NULL,

`p_lname` VARCHAR(20) NULL,

`p_add` VARCHAR(40) NOT NULL,

`p_mail_id` VARCHAR(20) NOT NULL,

`p_charges` DECIMAL(20) NULL,

PRIMARY KEY (`p_id`),

UNIQUE INDEX `p_id_UNIQUE` (`p_id` ),

UNIQUE INDEX `p_mail_id_UNIQUE` (`p_mail_id` ));



CREATE TABLE `event_management`.`informals` (

`I_id` VARCHAR(20) NOT NULL,

`I_name` VARCHAR(25) NOT NULL,

`I_type` VARCHAR(45) NOT NULL,

`I_add` VARCHAR(45) NOT NULL,

`I_mail_id` VARCHAR(20) NOT NULL,

PRIMARY KEY (`I_id`),

UNIQUE INDEX `I_id_UNIQUE` (`I_id` ),

UNIQUE INDEX `I_mail_id_UNIQUE` (`I_mail_id` ),

UNIQUE INDEX `I_add_UNIQUE` (`I_add` ),

UNIQUE INDEX `I_type_UNIQUE` (`I_type` ));



CREATE TABLE `event_management`.`t_company1` (

`t_id` VARCHAR(20) NOT NULL,

`t_add` VARCHAR(45) NOT NULL,

`t_name` VARCHAR(25) NOT NULL,

PRIMARY KEY (`t_id`));



CREATE TABLE `event_management`.`t_company2` (

`t_phn` BIGINT(11) NOT NULL,

`t_id2` VARCHAR(20) NOT NULL,

UNIQUE INDEX `t_phn_UNIQUE` (`t_phn` ),

PRIMARY KEY (`t_id2`),

CONSTRAINT `t_id2`

FOREIGN KEY (`t_id2`)

REFERENCES `event_management`.`t_company1` (`t_id`));



CREATE TABLE `event_management`.`venueaddress1` (

`pincode` VARCHAR(8) NOT NULL,

`line1` VARCHAR(45) NULL,

`line2` VARCHAR(45) NULL,

`v_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`pincode`, `v_id2`),

UNIQUE INDEX `pincode_UNIQUE` (`pincode` ),

INDEX `v_id2_idx` (`v_id2` ),

CONSTRAINT `v_id2`

FOREIGN KEY (`v_id2`)

REFERENCES `event_management`.`venue1` (`v_id`));



CREATE TABLE `event_management`.`venueaddress2` (

`city` VARCHAR(15) NOT NULL,

`state` VARCHAR(15) NOT NULL,

`pincode1` VARCHAR(8) NOT NULL,

PRIMARY KEY (`pincode1`),

CONSTRAINT `pincode1`

FOREIGN KEY (`pincode1`)

REFERENCES `event_management`.`venueaddress1` (`pincode`));



CREATE TABLE `event_management`.`employees2` (

`emp_phn` VARCHAR(11) NOT NULL,

`emp_id3` VARCHAR(20) NOT NULL,

UNIQUE INDEX `emp_phn_UNIQUE` (`emp_phn` ),

PRIMARY KEY (`emp_id3`),

CONSTRAINT `emp_id3`

FOREIGN KEY (`emp_id3`)

REFERENCES `event_management`.`employees1` (`emp_id`));


/////////////////////////////////


CREATE TABLE  `event_management`.`event` (

`eve_id` VARCHAR(20) NOT NULL,

`eve_date` DATE NOT NULL,

`eve_time` TIME NOT NULL,

`eve_feedback` VARCHAR(59) NULL,

`eve_type` VARCHAR(25) NOT NULL,

`eve_budget` BIGINT(20) NOT NULL,

`eve_trans_charges` DECIMAL(10) NULL,

`emp_id5` VARCHAR(20) NOT NULL,

`p_id1` VARCHAR(20) NOT NULL,

`d_type2` VARCHAR(20) NOT NULL,

`m_type1` VARCHAR(20) NOT NULL,

`f_type1` VARCHAR(20) NOT NULL,

`v_id3` VARCHAR(20) NOT NULL,

`c_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`eve_id`, `emp_id5`, `p_id1`, `d_type2`, `m_type1`, `f_type1`, `v_id3`, `c_id2`),

UNIQUE INDEX `eve_id_UNIQUE` (`eve_id` ),

INDEX `emp_id5_idx` (`emp_id5` ),

INDEX `p_id1_idx` (`p_id1` ),

INDEX `v_id3_idx` (`v_id3` ),

INDEX `c_id2_idx` (`c_id2` ),

INDEX `f_type1_idx` (`f_type1` ),

INDEX `d_type2_idx` (`d_type2` ),

INDEX `m_type1_idx` (`m_type1` ),

CONSTRAINT `emp_id5`

FOREIGN KEY (`emp_id5`)

REFERENCES `event_management`.`employees1` (`emp_id`)

CONSTRAINT `p_id1`

FOREIGN KEY (`p_id1`)

REFERENCES `event_management`.`photographers` (`p_id`)

CONSTRAINT `v_id3`

FOREIGN KEY (`v_id3`)

REFERENCES `event_management`.`venue1` (`v_id`)

CONSTRAINT `c_id2`

FOREIGN KEY (`c_id2`)

REFERENCES `event_management`.`customer1` (`c_id`)

CONSTRAINT `f_type1`

FOREIGN KEY (`f_type1`)

REFERENCES `event_management`.`food` (`f_type`)

CONSTRAINT `d_type2`

FOREIGN KEY (`d_type2`)

REFERENCES `event_management`.`decoration` (`d_type`)

CONSTRAINT `m_type1`

FOREIGN KEY (`m_type1`)

REFERENCES `event_management`.`makeup` (`m_type`))


//////////////////////////////////////

CREATE TABLE `event_management`.`Apointed_to` (

`emp_id1` VARCHAR(20) NOT NULL,

`eve_id5` VARCHAR(20) NOT NULL,

PRIMARY KEY (`emp_id1`, `eve_id5`),

INDEX `eve_id_idx` (`eve_id5` ),

CONSTRAINT `emp_id1`

FOREIGN KEY (`emp_id1`)

REFERENCES `event_management`.`employees1` (`emp_id`),

CONSTRAINT `eve_id5`

FOREIGN KEY (`eve_id5`),

REFERENCES `event_management`.`event` (`eve_id`));



31 . CREATE TABLE `event_management`.`conducted` (

`I_id1` VARCHAR(20) NOT NULL,

`eve_id3` VARCHAR(20) NOT NULL,

PRIMARY KEY (`I_id1`, `eve_id3`),

CONSTRAINT `I_id1`

FOREIGN KEY (`I_id1`)

REFERENCES `event_management`.`informals` (`I_id`)

ON DELETE NO ACTION

ON UPDATE NO ACTION,

CONSTRAINT `eve_id3`

FOREIGN KEY (`eve_id3`)

REFERENCES `event_management`.`event` (`eve_id`))

    CREATE TABLE `event_management`.`supplied by` (

`e_id2` VARCHAR(20) NOT NULL,

`el_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`e_id2`, `el_id2`),

INDEX `el_id_idx` (`el_id2` ),

CONSTRAINT `e_id2`

FOREIGN KEY (`e_id2`)

REFERENCES `event_management`.`Ecompany` (`e_id`)

CONSTRAINT `el_id2`

FOREIGN KEY (`el_id2`)

REFERENCES `event_management`.`Elec_equip` (`el_id`))

    CREATE TABLE `event_management`.`provided` (

`t_id1` VARCHAR(20) NOT NULL,

`v_name1` VARCHAR(45) NOT NULL,

PRIMARY KEY (`t_id1`, `v_name1`),

CONSTRAINT `t_id`

FOREIGN KEY (`t_id1`)

REFERENCES `event_management`.`t_company1` (`t_id`)

CONSTRAINT `v_name`

FOREIGN KEY (`v_name1`)

REFERENCES `event_management`.`transportation` (`v_name`))

    CREATE TABLE `event_management`.`served by` (

`cat_id1` VARCHAR(20) NOT NULL,

`f_type1` VARCHAR(45) NOT NULL,

PRIMARY KEY (`cat_id1`, `f_type1`),

UNIQUE INDEX `cat_id1_UNIQUE` (`cat_id1` ),

UNIQUE INDEX `f_type1_UNIQUE` (`f_type1` ),

CONSTRAINT `cat_id`

FOREIGN KEY (`cat_id1`)

REFERENCES `event_management`.`caterers` (`cat_id`)

CONSTRAINT `f_type`

FOREIGN KEY (`f_type1`)

REFERENCES `event_management`.`food` (`f_type`))

    CREATE TABLE `event_management`.`arranged for` (

`v_name1` VARCHAR(40) NOT NULL,

`eve_id2` VARCHAR(20) NOT NULL,

PRIMARY KEY (`v_name1`, `eve_id2`),

CONSTRAINT `v_name1`

FOREIGN KEY (`v_name1`)

REFERENCES `event_management`.`transportation` (`v_name`)

CONSTRAINT `eve_id2`

FOREIGN KEY (`eve_id2`)

REFERENCES `event_management`.`event` (`eve_id`))

    CREATE TABLE `event_management`.`needs` (

`el_id1` VARCHAR(20) NOT NULL,

`eve_id4` VARCHAR(20) NOT NULL,

PRIMARY KEY (`el_id1`, `eve_id4`),

INDEX `eve_id_idx` (`eve_id4` ),

CONSTRAINT `el_id1`

FOREIGN KEY (`el_id1`)

REFERENCES `event_management`.`Elec_equip` (`el_id`)

CONSTRAINT `eve_id4`

FOREIGN KEY (`eve_id4`)

REFERENCES `event_management`.`event` (`eve_id`)

)

    CREATE TABLE `event_management`.`Performs` (

`per_id1` VARCHAR(20) NOT NULL,

`eve_id1` VARCHAR(20) NOT NULL,

PRIMARY KEY (`per_id1`, `eve_id1`),

INDEX `eve_id_idx` (`eve_id1` ),

CONSTRAINT `per_id1`

FOREIGN KEY (`per_id1`)

REFERENCES `event_management`.`performers` (`per_id`)

CONSTRAINT `eve_id1`

FOREIGN KEY (`eve_id1`)

REFERENCES `event_management`.`event` (`eve_id`)

)