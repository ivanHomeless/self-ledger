CREATE DATABASE selfledger;
CREATE USER selfledger WITH PASSWORD 'selfledger';
GRANT ALL PRIVILEGES ON DATABASE selfledger TO selfledger;

\connect selfledger;

ALTER SCHEMA public OWNER TO selfledger;
GRANT ALL PRIVILEGES ON SCHEMA public TO selfledger;
