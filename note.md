nrp
full_name
jabatan
klasifikasi_jab
job_rank
department
section
status
area_kerja
lokasi_kerja
level_karyawan
status_pegawai
tanggal_masuk
direct_indirect
ukuran_baju
ukuran_celana

# step 2

tempat_lahir
kabupaten_lahir
provinsi_lahir
tanggal_lahir
agama
suku
gender
golongan_darah
no_ktp

# step 3

pendidikan
nama_sekolah
alamat_ktp
kabupaten_ktp
provinsi_ktp
alamat_tinggal
kabupaten_tinggal
provinsi_tinggal

ADD QUERY :
ALTER TABLE `workers_cuti_period` ADD `revision` INT(2) NOT NULL DEFAULT '0' AFTER `reject`;
ALTER TABLE `workers_cuti_kerja` ADD `revision` INT(2) NOT NULL DEFAULT '0' AFTER `reject`;
ALTER TABLE `workers_cuti_period` ADD `revision_ref_id` BIGINT(255) NULL DEFAULT NULL AFTER `revision`;
ALTER TABLE `workers_cuti_kerja` ADD `revision_ref_id` BIGINT(255) NULL DEFAULT NULL AFTER `revision`;

ADD QUERY TRAVEL :
ALTER TABLE `workers_travel` ADD `category` INT(20) NOT NULL AFTER `end_date`, ADD `trip_number` VARCHAR(200) NOT NULL AFTER `category`, ADD `destination` VARCHAR(200) NOT NULL AFTER `trip_number`, ADD `include_ta` VARCHAR(10) NOT NULL AFTER `destination`, ADD `trip_date` DATE NULL AFTER `include_ta`, ADD `trip_from` VARCHAR(200) NOT NULL AFTER `trip_date`, ADD `trip_finish` VARCHAR(200) NOT NULL AFTER `trip_from`, ADD `include_family` VARCHAR(10) NOT NULL AFTER `trip_finish`, ADD `transportation_allowance` INT(20) NOT NULL AFTER `include_family`, ADD `meal_allowance` INT(20) NOT NULL AFTER `transportation_allowance`, ADD `money_allowance` INT(20) NOT NULL AFTER `meal_allowance`, ADD `hotel_allowance` INT(20) NOT NULL AFTER `money_allowance`, ADD `ticket_allowance` INT(20) NOT NULL AFTER `hotel_allowance`, ADD `other_allowance` INT(20) NOT NULL AFTER `ticket_allowance`, ADD `total_allowance` INT(20) NOT NULL AFTER `other_allowance`, ADD `other_description` TEXT NOT NULL AFTER `total_allowance`;

INSERT INTO `enums` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `name`, `category`, `description`, `type`, `ref_id`, `by_user`) VALUES
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'BERANGKAT CUTI', NULL, NULL, 'category_travel', NULL, '1'),
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'KEMBALI CUTI', NULL, NULL, 'category_travel', NULL, '1'),
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'DINAS', NULL, NULL, 'category_travel', NULL, '1'),
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'TRAINING', NULL, NULL, 'category_travel', NULL, '1'),
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'MUTASI', NULL, NULL, 'category_travel', NULL, '1'),
(NULL, '2022-09-17 11:10:56', '2022-09-17 11:10:56', NULL, '', 'RESIGN', NULL, NULL, 'category_travel', NULL, '1');

UPDATE `workers_history` SET `updated_at`=NEW.updated_at ,`jabatan`=NEW.jabatan ,`level_jabatan`=NEW.level_jabatan ,`klasifikasi_jabatan`=NEW.klasifikasi_jabatan ,`job_rank`=NEW.job_rank ,`section`=NEW.section ,`department`=NEW.department ,`grade`=NEW.grade ,`area_kerja`=NEW.area_kerja ,`status_karyawan`=NEW.status_karyawan ,`status`=NEW.status ,`lokasi_kerja`=NEW.lokasi_kerja ,`staff_nonstaff`=NEW.staff_nonstaff ,`lokal_nonlokal`=NEW.lokal_nonlokal ,`poh`=NEW.poh ,`tanggal_masuk`=NEW.tanggal_masuk ,`tanggal_akhirkontrak`=NEW.tanggal_akhirkontrak ,`tanggal_akhirkontrak2`=NEW.tanggal_akhirkontrak2 ,`tanggal_efektif_diadaro`=NEW.tanggal_efektif_diadaro ,`tempat_lahir`=NEW.tempat_lahir ,`kabupaten_lahir`=NEW.kabupaten_lahir ,`provinsi_lahir`=NEW.provinsi_lahir ,`tanggal_lahir`=NEW.tanggal_lahir ,`pendidikan`=NEW.pendidikan ,`nama_sekolah`=NEW.nama_sekolah ,`jurusan`=NEW.jurusan ,`no_ijasah`=NEW.no_ijasah ,`tanggal_masuk_sekolah`=NEW.tanggal_masuk_sekolah ,`tanggal_lulus_sekolah`=NEW.tanggal_lulus_sekolah ,`agama`=NEW.agama ,`suku`=NEW.suku ,`gender`=NEW.gender ,`golongan_darah`=NEW.golongan_darah ,`status_keluarga`=NEW.status_keluarga ,`alamat`=NEW.alamat ,`kabupaten_alamat`=NEW.kabupaten_alamat ,`provinsi_alamat`=NEW.provinsi_alamat ,`no_wa`=NEW.no_wa ,`no_telp`=NEW.no_telp ,`keterangan_karyawan`=NEW.keterangan_karyawan ,`tanggal_keluar`=NEW.tanggal_keluar ,`tanggal_final_pb`=NEW.tanggal_final_pb ,`alasan_keluar`=NEW.alasan_keluar ,`email_sis`=NEW.email_sis ,`email_pribadi`=NEW.email_pribadi ,`no_bpjs_karyawan`=NEW.no_bpjs_karyawan ,`no_kk`=NEW.no_kk ,`tinggal_dengan`=NEW.tinggal_dengan ,`alamat_tinggal`=NEW.alamat_tinggal ,`kabupaten_tinggal`=NEW.kabupaten_tinggal ,`provinsi_tinggal`=NEW.provinsi_tinggal ,`no_telp_darurat`=NEW.no_telp_darurat ,`nama_telp_darurat`=NEW.nama_telp_darurat ,`alamat_no_telp_darurat`=NEW.alamat_no_telp_darurat ,`hub_keluarga_darurat`=NEW.hub_keluarga_darurat ,`nama_telp_darurat2`=NEW.nama_telp_darurat2 ,`no_telp_darurat2`=NEW.no_telp_darurat2 ,`alamat_no_telp_darurat2`=NEW.alamat_no_telp_darurat2 ,`hub_keluarga_darurat2`=NEW.hub_keluarga_darurat2 ,`ukuran_baju`=NEW.ukuran_baju ,`ukuran_celana`=NEW.ukuran_celana ,`ukuran_sepatu`=NEW.ukuran_sepatu ,`sim`=NEW.sim ,`jenis_penerimaan`=NEW.jenis_penerimaan ,`alamat_npwp`=NEW.alamat_npwp ,`tanggal_npwp`=NEW.tanggal_npwp ,`jarak_titik_jemput`=NEW.jarak_titik_jemput ,`no_ktp`=NEW.no_ktp ,`no_rekening`=NEW.no_rekening ,`nama_rekening`=NEW.nama_rekening ,`bank_rekening`=NEW.bank_rekening ,`no_jamsostek`=NEW.no_jamsostek ,`no_npwp`=NEW.no_npwp ,`no_simponi`=NEW.no_simponi ,`direct_indirect`=NEW.direct_indirect ,`path_foto`=NEW.path_foto ,`remark`=NEW.remark ,`by_user`=NEW.by_user WHERE nrp_int=OLD.nrp_int
ADD QUERY WORKERS :
ALTER TABLE `workers` ADD `alamat_tinggal_pasangan` TEXT NULL DEFAULT NULL AFTER `provinsi_tinggal`, ADD `kab_tinggal_pasangan` VARCHAR(50) NULL DEFAULT NULL AFTER `alamat_tinggal_pasangan`, ADD `prov_tinggal_pasangan` VARCHAR(50) NULL DEFAULT NULL AFTER `kab_tinggal_pasangan`;
ALTER TABLE `workers` ADD `status_pajak` VARCHAR(10) NULL DEFAULT NULL AFTER `status_keluarga`;

INSERT INTO `enums` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `name`, `category`, `description`, `type`, `ref_id`, `by_user`) VALUES
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'S/1', 'S/1', NULL, NULL, 'worker_married_status', '0', '1'),
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'S/2', 'S/2', NULL, NULL, 'worker_married_status', '0', '1'),
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'S/3', 'S/3', NULL, NULL, 'worker_married_status', '0', '1'),
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'M/4', 'M/4', NULL, NULL, 'worker_married_status', '0', '1'),
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'M/5', 'M/5', NULL, NULL, 'worker_married_status', '0', '1'),
(NULL, '2022-03-08 07:55:36', '2022-03-08 07:55:36', NULL, 'M/6', 'M/6', NULL, NULL, 'worker_married_status', '0', '1');
