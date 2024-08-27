DROP DATABASE IF EXISTS basquet_project;
CREATE DATABASE basquet_project;

USE basquet_project;

CREATE TABLE roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(255) NOT NULL
);

CREATE TABLE teams (
    team_id INT PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(255) NOT NULL,
    team_total_points INT NOT NULL,
    team_state BOOLEAN DEFAULT TRUE,
    team_annotation TEXT
);

CREATE TABLE tournaments (
    tournament_id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_name VARCHAR(255) NOT NULL,
    tournament_start_date DATE,
    tournament_end_date DATE
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_lastname VARCHAR(255) NOT NULL,
    user_tshirt_number INT NOT NULL,
    user_role_id INT NOT NULL,
    user_team_id INT,
    user_state BOOLEAN DEFAULT TRUE,
    user_annotation TEXT,
    FOREIGN KEY (user_role_id) REFERENCES roles(role_id) ON DELETE CASCADE,
    FOREIGN KEY (user_team_id) REFERENCES teams(team_id) ON DELETE SET NULL
);

CREATE TABLE matches (
    match_id INT PRIMARY KEY AUTO_INCREMENT,
    match_date DATE NOT NULL,
    match_hour TIME NOT NULL,
    match_tournament_id INT NOT NULL,
    match_state BOOLEAN DEFAULT TRUE,
    match_annotation TEXT,
    FOREIGN KEY (match_tournament_id) REFERENCES tournaments(tournament_id) ON DELETE CASCADE
);

CREATE TABLE results (
    result_id INT PRIMARY KEY AUTO_INCREMENT,
    result_winner INT NOT NULL,
    result_details TEXT,
    match_id INT NOT NULL UNIQUE,
    FOREIGN KEY (match_id) REFERENCES matches(match_id) ON DELETE CASCADE
);

CREATE TABLE teams_has_matches (
    teams_match_id INT PRIMARY KEY AUTO_INCREMENT,
    match_id INT NOT NULL,
    team_id INT NOT NULL,
    FOREIGN KEY (match_id) REFERENCES matches(match_id) ON DELETE CASCADE,
    FOREIGN KEY (team_id) REFERENCES teams(team_id) ON DELETE CASCADE
);

CREATE TABLE referees (
    referee_id INT PRIMARY KEY AUTO_INCREMENT,
    referee_name VARCHAR(255) NOT NULL
);

CREATE TABLE matches_has_referees (
    match_id INT NOT NULL,
    referee_id INT NOT NULL,
    PRIMARY KEY (match_id, referee_id),
    FOREIGN KEY (match_id) REFERENCES matches(match_id) ON DELETE CASCADE,
    FOREIGN KEY (referee_id) REFERENCES referees(referee_id) ON DELETE CASCADE
);
