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
    team_state BOOLEAN DEFAULT TRUE,
    team_annotation TEXT
);

CREATE TABLE tournaments (
    tournament_id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_name VARCHAR(255) NOT NULL,
    tournament_start_date DATE,
    tournament_end_date DATE,
    tournament_state TEXT,
    tournament_canceled BOOL DEFAULT FALSE,
    tournament_annotation TEXT
);

CREATE TABLE referees (
    referee_id INT PRIMARY KEY AUTO_INCREMENT,
    referee_name VARCHAR(255) NOT NULL,
    referee_state BOOL DEFAULT TRUE,
    referee_annotation TEXT
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_lastname VARCHAR(60) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_username VARCHAR(40) NOT NULL,
    user_password VARCHAR(60) NOT NULL,
    user_state BOOLEAN DEFAULT TRUE,
    user_annotation TEXT,
    user_role_id INT NOT NULL,
    FOREIGN KEY (user_role_id) REFERENCES roles (role_id) ON DELETE CASCADE
);

CREATE TABLE players (
    player_id INT PRIMARY KEY AUTO_INCREMENT,
    player_name VARCHAR(40) NOT NULL,
    player_lastname VARCHAR(60) NOT NULL,
    player_number INT NOT NULL,
    player_condition TEXT,
    player_state BOOL DEFAULT(true),
    player_annotation TEXT,
    role_id INT NOT NULL,
    team_id INT,
    FOREIGN KEY (role_id) REFERENCES roles (role_id) ON DELETE CASCADE,
    FOREIGN KEY (team_id) REFERENCES teams (team_id) ON DELETE SET NULL
);

CREATE TABLE matches (
    match_id INT PRIMARY KEY AUTO_INCREMENT,
    match_date DATE NOT NULL,
    match_hour TIME NOT NULL,
    match_description TEXT,
    match_state BOOLEAN DEFAULT TRUE,
    match_annotation TEXT,
    tournament_id INT NOT NULL,
    referee_id INT NOT NULL,
    FOREIGN KEY (tournament_id) REFERENCES tournaments (tournament_id) ON DELETE CASCADE,
    FOREIGN KEY (referee_id) REFERENCES referees (referee_id) ON DELETE CASCADE
);

CREATE TABLE matches_has_teams (
    match_team_id INT PRIMARY KEY AUTO_INCREMENT,
    match_team_points INT,
    match_team_comments TEXT,
    match_id INT NOT NULL,
    team_id INT NOT NULL,
    FOREIGN KEY (match_id) REFERENCES matches (match_id) ON DELETE CASCADE,
    FOREIGN KEY (team_id) REFERENCES teams (team_id) ON DELETE CASCADE
);