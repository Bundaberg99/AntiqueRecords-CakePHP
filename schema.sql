CREATE TABLE `genres` (
                          `id` int(11) NOT NULL,
                          `name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `records` (
                           `id` int(11) NOT NULL,
                           `title` text NOT NULL,
                           `artist` varchar(50) NOT NULL,
                           `year` year(4) NOT NULL,
                           `genre_id` int(11) NOT NULL,
                           `no_of_discs` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
    ADD PRIMARY KEY (`id`),
    ADD KEY `genre_FK` (`genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
    ADD CONSTRAINT `genre_FK` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);
