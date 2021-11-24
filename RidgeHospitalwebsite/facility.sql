drop database if exists facility;

create database facility;
use facility;

-- Structure for Users table
create table login(
    user_id varchar(10),
    username varchar(20),
    email varchar(100),
    password varchar(100)
);

-- Data for Users table
insert into login(user_id, username, email, password) values ('D00163', 'test', 'test@ridgehospital.com.gh', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa');

-- Structure for Doctors table
create table doctors(
    doctor_id varchar(10) primary key , -- starts with D
    name varchar(50), 
    age int,
    gender enum('Female','Male','Other') default null,
    address varchar(50)
);

-- Data for Doctors table
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();
# insert into doctors(doctor_id, name, age, gender, address) values ();

-- Structure for Nurses table
create table nurses(
    nurse_id varchar(10) primary key , -- starts with N
    name varchar(50),
    age int,
    gender enum('Female','Male','Other') default null,
    address varchar(50)
);

-- Data for Nurses table
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();
# insert into nurses (nurse_id, name, age, gender, address) values ();

-- Structure of Patients table 
create table patients(
    patient_id varchar(10) primary key, -- starts with P
    name varchar(50),
    age int,
    gender enum('Female','Male','Other') default null,
    address varchar(50),
    disease varchar(50),
    care_type enum('In-patient', 'Out-patient'),
    doctor_id varchar(10), -- starts with D
    nurse_id varchar(10), -- starts with N
    foreign key (doctor_id) references doctors(doctor_id),
    foreign key (nurse_id) references nurses(nurse_id)
);

-- Data for Patients table
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();
# insert into patients (patient_id, name, age, gender, address, disease, care_type, doctor_id, nurse_id) values ();

-- Structure for Laboratories table
create table laboratories(
    lab_id varchar(10) primary key,
    patient_id varchar(10),
    doctor_id varchar(10),
    nurse_id varchar(10),
    date datetime, -- YYYY-MM-DD HH:MM:SS
    amount int,
    foreign key (patient_id) references patients(patient_id),
    foreign key (doctor_id) references doctors(doctor_id),
    foreign key (nurse_id) references nurses(nurse_id)
);

-- Data for laboratories table
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();
# insert into laboratories (lab_id, patient_id, doctor_id, nurse_id, date, amount) values ();

-- Structure for Rooms table
create table rooms(
    room_no varchar(10) primary key,
    room_type varchar(30),
    status enum('Unoccupied', 'Occupied')
);

-- Data for Rooms table
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();
# insert into rooms (room_no, room_type, status) values ();

-- Structure for In-Patients table
create table in_patient(
    patient_id varchar(10) primary key,
    room_no varchar(10),
    date_of_admission datetime,
    date_of_discharge datetime,
    lab_id varchar(10),
    nurse_id varchar(10),
    foreign key (patient_id) references patients(patient_id),
    foreign key (room_no) references rooms(room_no),
    foreign key (lab_id) references laboratories(lab_id),
    foreign key (nurse_id) references nurses(nurse_id)
);

-- Data for In-Patient table
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();
# insert into in_patient (patient_id, room_no, date_of_admission, date_of_discharge, lab_id, nurse_id) values ();

-- Structure for Out-Patients table
create table out_patient(
    patient_id varchar(10) primary key,
    date datetime,
    lab_id varchar(10),
    doctor_id varchar(10),
    nurse_id varchar(10),
    foreign key (patient_id) references patients(patient_id),
    foreign key (lab_id) references laboratories(lab_id),
    foreign key (doctor_id) references doctors(doctor_id),
    foreign key (nurse_id) references nurses(nurse_id)
);

-- Data for Out-Patients table
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();
# insert into out_patient (patient_id, date, lab_id, doctor_id, nurse_id) values ();

-- Structure for Bills table
create table bills(
    bill_id int primary key,
    patient_id varchar(10),
    doctor_charge int,
    room_charge int,
    length_of_stay int,
    lab_charge int,
    total_bill int,
    foreign key (patient_id) references patients(patient_id)
);

-- Data for Bills table
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
# insert into bills (bill_id, patient_id, doctor_charge, room_charge, length_of_stay, lab_charge, total_bill) values ();
