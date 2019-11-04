DATABASE CREATE `contact_test`
USE `contact_test`

CREATE TABLE `contact_info_saved` (
  `id` int(6) NOT NULL,
  `contact_name` text NOT NULL,
  `contact_email` text NOT NULL,
  `contact_phone` text,
  `contact_message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `contact_info_saved`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contact_info_saved`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;