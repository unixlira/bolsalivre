-- MySQL Script generated by MySQL Workbench
-- seg 03 dez 2018 19:58:19 -02
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bolsalivre2018
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bolsalivre2018
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bolsalivre2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bolsalivre2018` ;

-- -----------------------------------------------------
-- Table `bolsalivre2018`.`blogs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`blogs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `slug_2` VARCHAR(255) NOT NULL,
  `title_2` VARCHAR(255) NOT NULL,
  `image_2` VARCHAR(255) NULL DEFAULT NULL,
  `slug_3` VARCHAR(255) NOT NULL,
  `title_3` VARCHAR(255) NOT NULL,
  `image_3` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `link` TEXT NULL DEFAULT NULL,
  `link_2` TEXT NULL DEFAULT NULL,
  `link_3` TEXT NULL DEFAULT NULL,
  `category` TEXT NULL DEFAULT NULL,
  `category_2` TEXT NULL DEFAULT NULL,
  `category_3` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`categories` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `internal_category` TEXT NOT NULL,
  `slug` TEXT NOT NULL,
  `category_subcategory_id` INT(255) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`category_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`category_product` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` INT(10) UNSIGNED NOT NULL,
  `product_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`category_subcategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`category_subcategory` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` INT(10) UNSIGNED NOT NULL,
  `subcategory_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 78
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`states`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`states` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `letter` VARCHAR(255) NOT NULL,
  `iso` INT(11) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `population` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`cities` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` INT(10) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `status` INT(11) NOT NULL DEFAULT '1',
  `slug` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `cities_state_id_foreign` (`state_id` ASC),
  CONSTRAINT `cities_state_id_foreign`
    FOREIGN KEY (`state_id`)
    REFERENCES `bolsalivre2018`.`states` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`contacts` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` VARCHAR(20) NOT NULL,
  `phone_hours` VARCHAR(100) NOT NULL,
  `wpp` VARCHAR(20) NOT NULL,
  `wpp_hours` VARCHAR(100) NOT NULL,
  `chat` VARCHAR(200) NOT NULL,
  `chat_hours` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `email` VARCHAR(200) NULL DEFAULT NULL,
  `address` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`faqs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`faqs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `answer` TEXT NOT NULL,
  `total_read` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `faqs_id_unique` (`id` ASC),
  INDEX `faqs_question_index` (`question` ASC),
  INDEX `faqs_slug_index` (`slug` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`how_it_works`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`how_it_works` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` INT(11) NOT NULL,
  `how` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`institution_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`institution_product` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_id` INT(10) UNSIGNED NOT NULL,
  `product_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 139
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`institution_shift`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`institution_shift` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_id` INT(10) UNSIGNED NOT NULL,
  `shift_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 259
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`neighborhoods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`neighborhoods` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `city_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `slug` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `neighborhoods_city_id_foreign` (`city_id` ASC),
  CONSTRAINT `neighborhoods_city_id_foreign`
    FOREIGN KEY (`city_id`)
    REFERENCES `bolsalivre2018`.`cities` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 168
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `telephone` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 70
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`institutions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`institutions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `cnpj` VARCHAR(255) NULL DEFAULT NULL,
  `address` TEXT NULL DEFAULT NULL,
  `cep` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `thumbnail` VARCHAR(255) NULL DEFAULT NULL,
  `neighborhood_id` INT(10) UNSIGNED NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `destaque_home` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `total_read` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
  `rules` TEXT NULL DEFAULT NULL,
  `excerpt` TEXT NULL DEFAULT NULL,
  `unidade` VARCHAR(255) NOT NULL,
  `bairros_vizinhos` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `institutions_id_unique` (`id` ASC),
  INDEX `institutions_neighborhood_id_foreign` (`neighborhood_id` ASC),
  INDEX `institutions_slug_index` (`slug` ASC),
  INDEX `institutions_user_id_foreign` (`user_id` ASC),
  CONSTRAINT `institutions_neighborhood_id_foreign`
    FOREIGN KEY (`neighborhood_id`)
    REFERENCES `bolsalivre2018`.`neighborhoods` (`id`),
  CONSTRAINT `institutions_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `bolsalivre2018`.`users` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 103
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 91
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`orders` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `finalizado` TINYINT(1) NOT NULL DEFAULT '0',
  `pagamento_confirmado` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `orders_user_id_foreign` (`user_id` ASC),
  CONSTRAINT `orders_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `bolsalivre2018`.`users` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 35
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`order_bolsa_aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`order_bolsa_aluno` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT(10) UNSIGNED NOT NULL,
  `scholarship_id` INT(10) UNSIGNED NOT NULL,
  `institution_id` INT(10) UNSIGNED NOT NULL,
  `institution_name` VARCHAR(255) NOT NULL,
  `institution_unidade` VARCHAR(255) NOT NULL,
  `subcategory_id` INT(10) UNSIGNED NOT NULL,
  `subcategory_name` VARCHAR(255) NOT NULL,
  `category_id` INT(10) UNSIGNED NOT NULL,
  `category_name` VARCHAR(255) NOT NULL,
  `shift_id` INT(10) UNSIGNED NOT NULL,
  `shift_name` VARCHAR(255) NOT NULL,
  `valor_bolsa` DECIMAL(8,2) NOT NULL,
  `nome_aluno` VARCHAR(255) NOT NULL,
  `endereco_aluno` VARCHAR(255) NOT NULL,
  `nome_responsavel` VARCHAR(255) NOT NULL,
  `email_responsavel` VARCHAR(255) NOT NULL,
  `telefone_responsavel` VARCHAR(255) NOT NULL,
  `cpf_responsavel` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `order_bolsa_aluno_order_id_foreign` (`order_id` ASC),
  CONSTRAINT `order_bolsa_aluno_order_id_foreign`
    FOREIGN KEY (`order_id`)
    REFERENCES `bolsalivre2018`.`orders` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 43
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`permissions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `label` VARCHAR(200) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`roles` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `label` VARCHAR(200) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`permission_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`permission_role` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` INT(10) UNSIGNED NOT NULL,
  `role_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `permission_role_permission_id_foreign` (`permission_id` ASC),
  INDEX `permission_role_role_id_foreign` (`role_id` ASC),
  CONSTRAINT `permission_role_permission_id_foreign`
    FOREIGN KEY (`permission_id`)
    REFERENCES `bolsalivre2018`.`permissions` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign`
    FOREIGN KEY (`role_id`)
    REFERENCES `bolsalivre2018`.`roles` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`posts` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `posts_user_id_foreign` (`user_id` ASC),
  CONSTRAINT `posts_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `bolsalivre2018`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`products` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `total_read` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `products_id_unique` (`id` ASC),
  INDEX `products_slug_index` (`slug` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`role_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`role_user` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `role_user_role_id_foreign` (`role_id` ASC),
  CONSTRAINT `role_user_role_id_foreign`
    FOREIGN KEY (`role_id`)
    REFERENCES `bolsalivre2018`.`roles` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 71
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`scholarship_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`scholarship_tag` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `scholarship_id` INT(10) UNSIGNED NOT NULL,
  `tag_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 945
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`shifts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`shifts` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`subcategories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`subcategories` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `slug` TEXT NOT NULL,
  `internal_subcategory` VARCHAR(60) NOT NULL,
  `category_subcategory_id` INT(255) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 66
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`type_of_trainings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`type_of_trainings` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`scholarships`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`scholarships` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_id` INT(10) UNSIGNED NOT NULL,
  `subcategory_id` INT(10) UNSIGNED NOT NULL,
  `shift_id` INT(10) UNSIGNED NOT NULL,
  `mensalidade` DECIMAL(7,2) NULL DEFAULT NULL,
  `desconto` DECIMAL(4,2) NULL DEFAULT NULL,
  `vagas_estoque` INT(10) UNSIGNED NULL DEFAULT NULL,
  `vagas_site` INT(10) UNSIGNED NULL DEFAULT NULL,
  `parcelas` INT(10) UNSIGNED NULL DEFAULT NULL,
  `evolucao_preco` TINYINT(1) NOT NULL,
  `fora_estoque` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `total_read` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  `type_of_training_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
  `valor_final` DECIMAL(7,2) NULL DEFAULT NULL,
  `product_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
  `horario_curso` TEXT NULL DEFAULT NULL,
  `duracao` TEXT NULL DEFAULT NULL,
  `previsao_inicio` DATE NULL DEFAULT NULL,
  `tipo_graduacao` TEXT NULL DEFAULT NULL,
  `dias` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `scholarships_institution_id_foreign` (`institution_id` ASC),
  INDEX `scholarships_subcategory_id_foreign` (`subcategory_id` ASC),
  INDEX `scholarships_shift_id_foreign` (`shift_id` ASC),
  INDEX `scholarships_type_of_training_id_foreign` (`type_of_training_id` ASC),
  INDEX `scholarships_product_id_foreign` (`product_id` ASC),
  CONSTRAINT `scholarships_institution_id_foreign`
    FOREIGN KEY (`institution_id`)
    REFERENCES `bolsalivre2018`.`institutions` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `scholarships_product_id_foreign`
    FOREIGN KEY (`product_id`)
    REFERENCES `bolsalivre2018`.`products` (`id`),
  CONSTRAINT `scholarships_shift_id_foreign`
    FOREIGN KEY (`shift_id`)
    REFERENCES `bolsalivre2018`.`shifts` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `scholarships_subcategory_id_foreign`
    FOREIGN KEY (`subcategory_id`)
    REFERENCES `bolsalivre2018`.`subcategories` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `scholarships_type_of_training_id_foreign`
    FOREIGN KEY (`type_of_training_id`)
    REFERENCES `bolsalivre2018`.`type_of_trainings` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4098
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`socials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`socials` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `facebook` VARCHAR(255) NOT NULL,
  `youtube` VARCHAR(255) NOT NULL,
  `twitter` VARCHAR(255) NOT NULL,
  `instagram` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`tags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`tags` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(250) NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `active` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `tags_name_unique` (`name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`testimonies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`testimonies` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `text` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`work_with_uses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`work_with_uses` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_by` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `work_with_uses_id_unique` (`id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`subcategories_has_category_subcategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`subcategories_has_category_subcategory` (
  `subcategories_id` INT(10) UNSIGNED NOT NULL,
  `category_subcategory_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`subcategories_id`, `category_subcategory_id`),
  INDEX `fk_subcategories_has_category_subcategory_category_subcateg_idx` (`category_subcategory_id` ASC),
  INDEX `fk_subcategories_has_category_subcategory_subcategories1_idx` (`subcategories_id` ASC),
  CONSTRAINT `fk_subcategories_has_category_subcategory_subcategories1`
    FOREIGN KEY (`subcategories_id`)
    REFERENCES `bolsalivre2018`.`subcategories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subcategories_has_category_subcategory_category_subcategory1`
    FOREIGN KEY (`category_subcategory_id`)
    REFERENCES `bolsalivre2018`.`category_subcategory` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `bolsalivre2018`.`category_subcategory_has_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsalivre2018`.`category_subcategory_has_categories` (
  `category_subcategory_id` INT(10) UNSIGNED NOT NULL,
  `categories_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`category_subcategory_id`, `categories_id`),
  INDEX `fk_category_subcategory_has_categories_categories1_idx` (`categories_id` ASC),
  INDEX `fk_category_subcategory_has_categories_category_subcategory_idx` (`category_subcategory_id` ASC),
  CONSTRAINT `fk_category_subcategory_has_categories_category_subcategory1`
    FOREIGN KEY (`category_subcategory_id`)
    REFERENCES `bolsalivre2018`.`category_subcategory` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_subcategory_has_categories_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `bolsalivre2018`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;