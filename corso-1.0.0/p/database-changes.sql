ALTER TABLE `user`
  ADD COLUMN `reset_token_hash` VARCHAR(64) NULL DEFAULT NULL,
  ADD COLUMN `reset_token_expires_at` DATETIME NULL DEFAULT NULL,
  ADD UNIQUE (`reset_token_hash`);
