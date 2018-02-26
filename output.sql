--
-- PostgreSQL database dump
--

-- Dumped from database version 10.2 (Ubuntu 10.2-1.pgdg14.04+1)
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: contact_information; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE contact_information (
    contact_id integer NOT NULL,
    address_1 character varying(250) NOT NULL,
    address_2 character varying(250),
    state character(2) NOT NULL,
    zip character(5) NOT NULL,
    first_name character varying(80) NOT NULL,
    last_name character varying(80) NOT NULL,
    phone character varying(12) NOT NULL,
    email character varying(250) NOT NULL,
    user_name character varying(80),
    city character varying(50)
);


ALTER TABLE contact_information OWNER TO yamqipmnlpkmfr;

--
-- Name: contact_information_contact_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE contact_information_contact_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contact_information_contact_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: contact_information_contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE contact_information_contact_id_seq OWNED BY contact_information.contact_id;


--
-- Name: discussion; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE discussion (
    id integer NOT NULL,
    country character varying(50) NOT NULL
);


ALTER TABLE discussion OWNER TO yamqipmnlpkmfr;

--
-- Name: discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE discussion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE discussion_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE discussion_id_seq OWNED BY discussion.id;


--
-- Name: message; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE message (
    message_id integer NOT NULL,
    first_name character varying(80) NOT NULL,
    last_name character varying(80) NOT NULL,
    phone character varying(12) NOT NULL,
    email character varying(250) NOT NULL,
    date date NOT NULL,
    content character varying(1000) NOT NULL
);


ALTER TABLE message OWNER TO yamqipmnlpkmfr;

--
-- Name: message_message_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE message_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE message_message_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: message_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE message_message_id_seq OWNED BY message.message_id;


--
-- Name: reply; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE reply (
    reply_id integer NOT NULL,
    thread_id integer,
    content character varying(3000) NOT NULL,
    date date NOT NULL
);


ALTER TABLE reply OWNER TO yamqipmnlpkmfr;

--
-- Name: reply_reply_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE reply_reply_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE reply_reply_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: reply_reply_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE reply_reply_id_seq OWNED BY reply.reply_id;


--
-- Name: survey; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE survey (
    survey_id integer NOT NULL,
    first_name character varying(80) NOT NULL,
    last_name character varying(80) NOT NULL,
    phone character varying(12) NOT NULL,
    email character varying(250) NOT NULL,
    country character varying(250) NOT NULL
);


ALTER TABLE survey OWNER TO yamqipmnlpkmfr;

--
-- Name: survey_survey_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE survey_survey_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE survey_survey_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: survey_survey_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE survey_survey_id_seq OWNED BY survey.survey_id;


--
-- Name: thread; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE thread (
    thread_id integer NOT NULL,
    discussion_country character varying(50),
    title character varying(250) NOT NULL,
    content character varying(3000) NOT NULL,
    date date NOT NULL
);


ALTER TABLE thread OWNER TO yamqipmnlpkmfr;

--
-- Name: thread_thread_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE thread_thread_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE thread_thread_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: thread_thread_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE thread_thread_id_seq OWNED BY thread.thread_id;


--
-- Name: user_log; Type: TABLE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE TABLE user_log (
    user_id integer NOT NULL,
    user_name character varying(80) NOT NULL,
    password character varying(80) NOT NULL
);


ALTER TABLE user_log OWNER TO yamqipmnlpkmfr;

--
-- Name: user_log_user_id_seq; Type: SEQUENCE; Schema: public; Owner: yamqipmnlpkmfr
--

CREATE SEQUENCE user_log_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_log_user_id_seq OWNER TO yamqipmnlpkmfr;

--
-- Name: user_log_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER SEQUENCE user_log_user_id_seq OWNED BY user_log.user_id;


--
-- Name: contact_information contact_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY contact_information ALTER COLUMN contact_id SET DEFAULT nextval('contact_information_contact_id_seq'::regclass);


--
-- Name: discussion id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY discussion ALTER COLUMN id SET DEFAULT nextval('discussion_id_seq'::regclass);


--
-- Name: message message_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY message ALTER COLUMN message_id SET DEFAULT nextval('message_message_id_seq'::regclass);


--
-- Name: reply reply_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY reply ALTER COLUMN reply_id SET DEFAULT nextval('reply_reply_id_seq'::regclass);


--
-- Name: survey survey_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY survey ALTER COLUMN survey_id SET DEFAULT nextval('survey_survey_id_seq'::regclass);


--
-- Name: thread thread_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY thread ALTER COLUMN thread_id SET DEFAULT nextval('thread_thread_id_seq'::regclass);


--
-- Name: user_log user_id; Type: DEFAULT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY user_log ALTER COLUMN user_id SET DEFAULT nextval('user_log_user_id_seq'::regclass);


--
-- Data for Name: contact_information; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY contact_information (contact_id, address_1, address_2, state, zip, first_name, last_name, phone, email, user_name, city) FROM stdin;
2	awfaf		AL	     	keagan	scoot	;ijl;ij	viwf@lol.com	kee	\N
3	qwfoiajflij	selifjlfij	AL	     	samual	trent	20812412412	sam@gmail.com	samtrent	\N
1	370		ID	     	Daniel	Dang	123456789	dan15011@byui.edu	admin	\N
\.


--
-- Data for Name: discussion; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY discussion (id, country) FROM stdin;
\.


--
-- Data for Name: message; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY message (message_id, first_name, last_name, phone, email, date, content) FROM stdin;
\.


--
-- Data for Name: reply; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY reply (reply_id, thread_id, content, date) FROM stdin;
\.


--
-- Data for Name: survey; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY survey (survey_id, first_name, last_name, phone, email, country) FROM stdin;
\.


--
-- Data for Name: thread; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY thread (thread_id, discussion_country, title, content, date) FROM stdin;
\.


--
-- Data for Name: user_log; Type: TABLE DATA; Schema: public; Owner: yamqipmnlpkmfr
--

COPY user_log (user_id, user_name, password) FROM stdin;
1	admin	admin
2	kee	abcdefg
3	samtrent	samtrent
\.


--
-- Name: contact_information_contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('contact_information_contact_id_seq', 3, true);


--
-- Name: discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('discussion_id_seq', 1, false);


--
-- Name: message_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('message_message_id_seq', 1, false);


--
-- Name: reply_reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('reply_reply_id_seq', 1, false);


--
-- Name: survey_survey_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('survey_survey_id_seq', 1, false);


--
-- Name: thread_thread_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('thread_thread_id_seq', 1, false);


--
-- Name: user_log_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: yamqipmnlpkmfr
--

SELECT pg_catalog.setval('user_log_user_id_seq', 3, true);


--
-- Name: contact_information contact_information_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY contact_information
    ADD CONSTRAINT contact_information_pkey PRIMARY KEY (contact_id);


--
-- Name: discussion discussion_country_key; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_country_key UNIQUE (country);


--
-- Name: discussion discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_pkey PRIMARY KEY (id);


--
-- Name: message message_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY message
    ADD CONSTRAINT message_pkey PRIMARY KEY (message_id);


--
-- Name: reply reply_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_pkey PRIMARY KEY (reply_id);


--
-- Name: survey survey_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY survey
    ADD CONSTRAINT survey_pkey PRIMARY KEY (survey_id);


--
-- Name: thread thread_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY thread
    ADD CONSTRAINT thread_pkey PRIMARY KEY (thread_id);


--
-- Name: user_log user_log_pkey; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY user_log
    ADD CONSTRAINT user_log_pkey PRIMARY KEY (user_id);


--
-- Name: user_log user_log_user_name_key; Type: CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY user_log
    ADD CONSTRAINT user_log_user_name_key UNIQUE (user_name);


--
-- Name: contact_information contact_information_user_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY contact_information
    ADD CONSTRAINT contact_information_user_name_fkey FOREIGN KEY (user_name) REFERENCES user_log(user_name);


--
-- Name: reply reply_thread_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_thread_id_fkey FOREIGN KEY (thread_id) REFERENCES thread(thread_id);


--
-- Name: thread thread_discussion_country_fkey; Type: FK CONSTRAINT; Schema: public; Owner: yamqipmnlpkmfr
--

ALTER TABLE ONLY thread
    ADD CONSTRAINT thread_discussion_country_fkey FOREIGN KEY (discussion_country) REFERENCES discussion(country);


--
-- Name: public; Type: ACL; Schema: -; Owner: yamqipmnlpkmfr
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO yamqipmnlpkmfr;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO yamqipmnlpkmfr;


--
-- PostgreSQL database dump complete
--

