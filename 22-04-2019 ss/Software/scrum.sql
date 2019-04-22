--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: scrum; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE scrum WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';


ALTER DATABASE scrum OWNER TO postgres;

\connect scrum

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: conversor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.conversor (
    id integer NOT NULL,
    semanas integer,
    valor integer
);


ALTER TABLE public.conversor OWNER TO postgres;

--
-- Name: conversor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.conversor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.conversor_id_seq OWNER TO postgres;

--
-- Name: conversor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.conversor_id_seq OWNED BY public.conversor.id;


--
-- Name: documentacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.documentacion (
    id integer NOT NULL,
    nombre character varying(50),
    descripcion character varying(100),
    rutadocumento character varying(200)
);


ALTER TABLE public.documentacion OWNER TO postgres;

--
-- Name: documentacion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.documentacion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.documentacion_id_seq OWNER TO postgres;

--
-- Name: documentacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.documentacion_id_seq OWNED BY public.documentacion.id;


--
-- Name: invitacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.invitacion (
    id integer NOT NULL,
    idemisor integer,
    idreceptor integer,
    rol integer,
    estado integer,
    idproyecto integer
);


ALTER TABLE public.invitacion OWNER TO postgres;

--
-- Name: invitacion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.invitacion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.invitacion_id_seq OWNER TO postgres;

--
-- Name: invitacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.invitacion_id_seq OWNED BY public.invitacion.id;


--
-- Name: miembro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.miembro (
    idmiembro integer NOT NULL,
    idproyecto integer NOT NULL,
    idusuario integer NOT NULL,
    idrol integer NOT NULL,
    estado character varying(3) NOT NULL,
    delete timestamp without time zone
);


ALTER TABLE public.miembro OWNER TO postgres;

--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.miembro_idmiembro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.miembro_idmiembro_seq OWNER TO postgres;

--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.miembro_idmiembro_seq OWNED BY public.miembro.idmiembro;


--
-- Name: permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permiso (
    idpermiso integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    valor character varying(3) NOT NULL
);


ALTER TABLE public.permiso OWNER TO postgres;

--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permiso_idpermiso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permiso_idpermiso_seq OWNER TO postgres;

--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permiso_idpermiso_seq OWNED BY public.permiso.idpermiso;


--
-- Name: proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.proyecto (
    idproyecto integer NOT NULL,
    idusuario integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    fechainicio date NOT NULL,
    estado character varying(3) NOT NULL,
    nombre character varying(20),
    delete date
);


ALTER TABLE public.proyecto OWNER TO postgres;

--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.proyecto_idproyecto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyecto_idproyecto_seq OWNER TO postgres;

--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.proyecto_idproyecto_seq OWNED BY public.proyecto.idproyecto;


--
-- Name: proyectotmp; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.proyectotmp (
    id integer NOT NULL,
    nombre character varying(50),
    descripcion character varying(200),
    idusuario integer
);


ALTER TABLE public.proyectotmp OWNER TO postgres;

--
-- Name: proyectotmp_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.proyectotmp_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyectotmp_id_seq OWNER TO postgres;

--
-- Name: proyectotmp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.proyectotmp_id_seq OWNED BY public.proyectotmp.id;


--
-- Name: reunion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reunion (
    idreunion integer NOT NULL,
    idproyecto integer NOT NULL,
    fecha date NOT NULL,
    delete timestamp without time zone,
    nombre character varying(20),
    idsprint integer,
    idusuario integer,
    rutaarchivo character varying(200)
);


ALTER TABLE public.reunion OWNER TO postgres;

--
-- Name: reunion_idreunion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reunion_idreunion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reunion_idreunion_seq OWNER TO postgres;

--
-- Name: reunion_idreunion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reunion_idreunion_seq OWNED BY public.reunion.idreunion;


--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rol (
    idrol integer NOT NULL,
    idpermiso integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    nombre character varying(20) NOT NULL
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- Name: rol_idrol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rol_idrol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rol_idrol_seq OWNER TO postgres;

--
-- Name: rol_idrol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rol_idrol_seq OWNED BY public.rol.idrol;


--
-- Name: sprint; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sprint (
    idsprint integer NOT NULL,
    idproyecto integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    finicio date NOT NULL,
    delete timestamp without time zone,
    nombre character varying(20) NOT NULL,
    fechafinal date NOT NULL,
    estado integer DEFAULT 1,
    valor_sprint integer
);


ALTER TABLE public.sprint OWNER TO postgres;

--
-- Name: sprint_idsprint_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sprint_idsprint_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sprint_idsprint_seq OWNER TO postgres;

--
-- Name: sprint_idsprint_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sprint_idsprint_seq OWNED BY public.sprint.idsprint;


--
-- Name: tarea; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tarea (
    id_sprint integer,
    nombre character varying(30),
    descripcion character varying(100),
    valor integer,
    estado integer,
    id integer NOT NULL,
    delete date,
    fecha date
);


ALTER TABLE public.tarea OWNER TO postgres;

--
-- Name: tarea_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tarea_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tarea_id_seq OWNER TO postgres;

--
-- Name: tarea_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarea_id_seq OWNED BY public.tarea.id;


--
-- Name: tmp; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tmp (
    id integer NOT NULL,
    nombre character varying(120),
    estado integer DEFAULT 1
);


ALTER TABLE public.tmp OWNER TO postgres;

--
-- Name: tmp_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tmp_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tmp_id_seq OWNER TO postgres;

--
-- Name: tmp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tmp_id_seq OWNED BY public.tmp.id;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    idusuario integer NOT NULL,
    nombre character varying(20) NOT NULL,
    apellido character varying(20) NOT NULL,
    username character varying(20) NOT NULL,
    correo character varying(30) NOT NULL,
    password character varying(20) NOT NULL,
    rutafoto character varying(200) DEFAULT '../fotos/default.jpg'::character varying NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_idusuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_idusuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_idusuario_seq OWNER TO postgres;

--
-- Name: usuario_idusuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_idusuario_seq OWNED BY public.usuario.idusuario;


--
-- Name: conversor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conversor ALTER COLUMN id SET DEFAULT nextval('public.conversor_id_seq'::regclass);


--
-- Name: documentacion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.documentacion ALTER COLUMN id SET DEFAULT nextval('public.documentacion_id_seq'::regclass);


--
-- Name: invitacion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invitacion ALTER COLUMN id SET DEFAULT nextval('public.invitacion_id_seq'::regclass);


--
-- Name: miembro idmiembro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro ALTER COLUMN idmiembro SET DEFAULT nextval('public.miembro_idmiembro_seq'::regclass);


--
-- Name: permiso idpermiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso ALTER COLUMN idpermiso SET DEFAULT nextval('public.permiso_idpermiso_seq'::regclass);


--
-- Name: proyecto idproyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto ALTER COLUMN idproyecto SET DEFAULT nextval('public.proyecto_idproyecto_seq'::regclass);


--
-- Name: proyectotmp id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyectotmp ALTER COLUMN id SET DEFAULT nextval('public.proyectotmp_id_seq'::regclass);


--
-- Name: reunion idreunion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion ALTER COLUMN idreunion SET DEFAULT nextval('public.reunion_idreunion_seq'::regclass);


--
-- Name: rol idrol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol ALTER COLUMN idrol SET DEFAULT nextval('public.rol_idrol_seq'::regclass);


--
-- Name: sprint idsprint; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint ALTER COLUMN idsprint SET DEFAULT nextval('public.sprint_idsprint_seq'::regclass);


--
-- Name: tarea id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarea ALTER COLUMN id SET DEFAULT nextval('public.tarea_id_seq'::regclass);


--
-- Name: tmp id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tmp ALTER COLUMN id SET DEFAULT nextval('public.tmp_id_seq'::regclass);


--
-- Name: usuario idusuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN idusuario SET DEFAULT nextval('public.usuario_idusuario_seq'::regclass);


--
-- Data for Name: conversor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.conversor (id, semanas, valor) FROM stdin;
1	7	50
2	14	100
3	21	150
4	28	200
\.


--
-- Data for Name: documentacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.documentacion (id, nombre, descripcion, rutadocumento) FROM stdin;
1	02. Plantilla de Product Backlog.xlsx	Especificaci¢n de la pila de tareas a realizar por el equipo de trabajo	\N
2	03. Plantilla de Sprint Backlog.xlsx	Especificaci¢n de la pila de tareas a realizar por el equipo de trabajo durante el sprint	\N
3	04. Categorizar Target.xlsx	Identificaci¢n del target que accede al aplicativo	\N
4	05. Sprint review.xlsx	Formato de  nalisis port-sprint	\N
5	06. Diagrama de Gantt.xltx	Grafica sobre la destinaci¢n de tiempo a las tareas	\N
6	07. Lean Canvas.xlsx	Plantilla Lean Canvas sobre el proyecto	\N
7	08. Historia de usuario.xls	Definici¢n de casos de uso y requerimientos del aplicativo	\N
8	09. Tablero de validaciones.xlsx	Validaciones standar sobre el sistema	\N
10	11. Circulo de oro y cinco porques.docx	Descripci¢n de la trazabilidad del proyecto	\N
11	12. Reuniones Diarias.docx	Documento a llenar con lo dicho en la daily routine	\N
12	13. Requerimientos del sistema.docx	Plantilla de los requerimientos del sistema	\N
13	14. Team Canvas.pdf	Plantilla base de la team Canvas	\N
14	15. Team Canvas Basic.pdf	Plantilla b sica de la team Canvas	\N
15	16.UML.pdf	Libro sobre Diagramaci¢n UML	\N
16	17. Casos de uso.pdf	Ejemplo de diagramas de caso de uso	\N
18	19. Cono de la incertidumbre.jpg	Descripci¢n de la incertidumbre existente sobre el proyecto a plantear	\N
19	20. Adiciones recomendados.txt	Documentos adicionales que favorecen al entendimiento del proyecto	\N
\.


--
-- Data for Name: invitacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.invitacion (id, idemisor, idreceptor, rol, estado, idproyecto) FROM stdin;
\.


--
-- Data for Name: miembro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.miembro (idmiembro, idproyecto, idusuario, idrol, estado, delete) FROM stdin;
2	31	5	3	1	\N
3	32	5	3	1	\N
4	34	5	3	1	\N
5	35	5	3	1	\N
6	36	5	3	1	\N
7	37	5	3	1	\N
8	38	5	3	1	\N
30	48	5	3	1	\N
32	48	12	1	1	\N
33	48	16	1	1	\N
34	48	19	1	1	\N
31	48	13	2	2	\N
35	49	5	3	1	\N
37	49	16	1	1	\N
38	49	18	1	1	\N
39	49	19	1	1	\N
36	49	13	2	2	\N
40	50	5	3	1	\N
42	50	12	1	1	\N
43	50	16	1	1	\N
44	50	19	1	1	\N
41	50	13	2	2	\N
45	51	32	3	1	\N
46	51	29	2	1	\N
47	51	13	1	1	\N
48	51	17	1	1	\N
49	51	21	1	1	\N
50	52	7	3	1	\N
51	52	13	2	1	\N
52	52	16	1	1	\N
53	52	18	1	1	\N
54	52	19	1	1	\N
55	53	33	3	1	\N
56	53	29	2	1	\N
57	53	33	1	1	\N
58	53	19	1	1	\N
59	53	21	1	1	\N
60	54	5	3	1	\N
62	55	5	3	1	\N
63	55	13	2	1	\N
64	55	5	1	1	\N
65	56	5	3	1	\N
66	56	13	2	1	\N
67	56	33	1	1	\N
68	56	17	1	1	\N
69	56	21	1	1	\N
70	57	5	3	1	\N
71	58	5	3	1	\N
72	59	5	3	1	\N
\.


--
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permiso (idpermiso, descripcion, valor) FROM stdin;
1	Lectura	4
2	Lectura y ejecuci¢n	5
3	Lectura y escritura	6
4	Todos los permisos	7
\.


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.proyecto (idproyecto, idusuario, descripcion, fechainicio, estado, nombre, delete) FROM stdin;
31	5	esta es una accion	2019-02-18	1	accion	\N
32	5	esta es una demo	2019-02-18	1	dato	\N
35	5	hola wey	2019-02-27	1	nms	2019-03-01
36	5	nms	2019-02-27	2	lmd	\N
48	5	esto es un hola	2019-02-28	1	hola yeye	\N
49	5	prueba scrum	2019-03-02	1	scrum	\N
38	5	kmspico	2019-02-27	1	km	2019-03-02
50	5	este es el bpa	2019-03-03	1	bpa	\N
51	32	sADAWFAFAFFW	2019-03-04	1	darwinnn	\N
52	7	esto es un panda	2019-03-04	1	panda	\N
53	33	los de marras	2019-03-04	1	pepe	\N
34	5	hago una config al proyecto	2019-02-26	1	config	\N
37	5	este es el adios	2019-02-27	1	adios	\N
54	5	esta es mi prueba	2019-04-22	1	prueba buscador	\N
55	5	esta es mi prueba	2019-04-22	1	prueba buscador	2019-04-22
56	5	jkdfjkjk	2019-04-22	1	nms1	\N
57	5	es la prueba del arreglo	2019-04-22	1	arreglado	2019-04-22
58	5	es la prueba del arreglo	2019-04-22	1	arreglado	2019-04-22
59	5	prueba del final	2019-04-22	1	final	2019-04-22
\.


--
-- Data for Name: proyectotmp; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.proyectotmp (id, nombre, descripcion, idusuario) FROM stdin;
28	finally	this is a final exmaple	5
\.


--
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reunion (idreunion, idproyecto, fecha, delete, nombre, idsprint, idusuario, rutaarchivo) FROM stdin;
8	48	2019-03-18	\N	dato_el	18	5	cedula_dos.pdf
9	48	2019-03-18	\N	hola_y_adios	18	5	education.pdf
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rol (idrol, idpermiso, descripcion, nombre) FROM stdin;
1	2	Desarrollador, lleva a cabo las multiples tareas de los sprints	desarrollador
2	3	SCRUM MASTER, gestiona el panel de documentaci¢n de los proyectos.	scrumMaster
3	4	PRODUCT OWNER, due¤o del producto enargado del proyecto y gestiona el sprint	productOwner
\.


--
-- Data for Name: sprint; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sprint (idsprint, idproyecto, descripcion, finicio, delete, nombre, fechafinal, estado, valor_sprint) FROM stdin;
15	32	Ejemplo de sprint en el aplicativo 	2019-02-20	2019-03-01 00:00:00	primer sprint	2019-02-27	1	\N
18	48	holi    \t\t	2019-03-02	\N	primer yeye	2019-03-23	1	150
19	49	estoy haciendo un testeo    	2019-03-02	\N	testeo	2019-03-23	1	150
20	51	    dawdawdadwawd	2019-03-04	\N	sdawww	2019-03-18	1	100
21	52	este es un sprint    	2019-03-04	\N	primer sprint	2019-03-18	1	100
22	53	    marco polo	2019-03-04	\N	marco	2019-03-11	1	50
23	53	    dog dog dog	2019-03-04	\N	perro	2019-03-18	1	100
17	48	esto es un hola    	2019-02-28	\N	hola	2019-03-07	2	50
\.


--
-- Data for Name: tarea; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarea (id_sprint, nombre, descripcion, valor, estado, id, delete, fecha) FROM stdin;
18	entrevista	hacer una entrevista	12	1	1	2019-03-02	2019-04-18
18	evento	hacer un evento	10	1	5	2019-03-02	2019-04-18
18	entrevista	hacer una entrevista	12	1	2	2019-03-02	2019-04-18
18	entrevista	hacer una entrevista	12	1	3	2019-03-02	2019-04-18
18	entrevista	hacer una entrevista	12	1	4	2019-03-02	2019-04-18
18	prueba	hago una prueba	10	1	6	2019-03-02	2019-04-18
18	dato	hago un dato	15	1	7	2019-03-02	2019-04-18
18	ejej	ejejejj	20	1	8	2019-03-02	2019-04-18
18	daniel	hacer tarea	20	1	10	2019-03-04	2019-04-18
20	aaaaaaaa	aaaaaaaaaaa	12	1	11	2019-03-04	2019-04-18
20	juio	revisar tarea	15	1	12	\N	2019-04-18
18	prueba	esto es una prueba	17	1	9	\N	2019-04-18
21	pandita	este es mi pandita	15	3	14	\N	2019-04-18
21	pablito	este es escobar	25	3	13	\N	2019-04-18
\.


--
-- Data for Name: tmp; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tmp (id, nombre, estado) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (idusuario, nombre, apellido, username, correo, password, rutafoto) FROM stdin;
32	dwawdaw	dadwawdwa	darwin	gusssau@gmail.com	123456789	../fotos/Complejidad en proyectos.jpg
7	yerson	ramirez	yeye1523	yeye1523@gmail.com	12345	../fotos/mano4d.jpg
5	Cristian	Cadavid	nouliet	cris1305cada@gmail.com	12345	../fotos/n.jpg
8	sonia	escarraga	sona78	sona78@hotmail.es	mariana16	../fotos/default.jpg
9	gjkdjfn	jfxgkjfhkj	kcjkfd	djdgkj@gmail.com	12345	../fotos/default.jpg
10	juan	valdes	valderrama	elpibe@yahoo.com	12345	../fotos/default.jpg
11	juan	aristizabal	kjdfhkdjh	jfhkgdjf@hotmail.es	098765	../fotos/default.jpg
12	jorge	bintez	perrillo	alejo@hotmail.com	12345	../fotos/default.jpg
13	ana	cristina	anita	ana2345@gmail.com	12345	../fotos/default.jpg
14	veronica	ksjdfhsh	dkfjhskjh	alex@gmail.com	12345	../fotos/default.jpg
15	luis	alfredo	guevara	guevara@gmail.com	12345	../fotos/default.jpg
16	loco	panda	panda	panda@gmail.com	12345	../fotos/default.jpg
33	rafa	giraldo	abdul	rafagiga@gmail.com	12345	../fotos/organos.jpg
17	andres	ramirez	andres123	andres123@gmail.com	12345	../fotos/default.jpg
18	gordo	perro	perro	perro@gmail.com	12345	../fotos/default.jpg
19	lucas	pato	pato_donald	pato@gmail.com	12345	../fotos/default.jpg
21	lucas	prato	anastacio	ana23@hotmail.com	1234567890	../fotos/default.jpg
23	kjgf	fghgjd	jkhfdkjh	jfhgfdgkj@yahoo.com	12345	../fotos/default.jpg
25	wilson	robledo	barrios	barrio24@gmail.com	12345	../fotos/default.jpg
26	mfk	klinton	klintos	klmn@hotmail.es	12345	../fotos/default.jpg
27	panda	drogo	droga	droga@gmail.com	12345	../fotos/default.jpg
28	graciela	cortez	graci	graci@gmail.com	12345	../fotos/default.jpg
29	carlos	andres	andres	andre@gmail.com	12345	../fotos/default.jpg
30	hola	hola	holam23	holah@gmail.com	12345	../fotos/default.jpg
31	gjkdjfn	hhkk	perrito	guau@gmail.com	12345	../fotos/default.jpg
\.


--
-- Name: conversor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.conversor_id_seq', 4, true);


--
-- Name: documentacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.documentacion_id_seq', 21, true);


--
-- Name: invitacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.invitacion_id_seq', 9, true);


--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.miembro_idmiembro_seq', 72, true);


--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permiso_idpermiso_seq', 4, true);


--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.proyecto_idproyecto_seq', 59, true);


--
-- Name: proyectotmp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.proyectotmp_id_seq', 28, true);


--
-- Name: reunion_idreunion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reunion_idreunion_seq', 9, true);


--
-- Name: rol_idrol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rol_idrol_seq', 3, true);


--
-- Name: sprint_idsprint_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sprint_idsprint_seq', 23, true);


--
-- Name: tarea_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarea_id_seq', 14, true);


--
-- Name: tmp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tmp_id_seq', 136, true);


--
-- Name: usuario_idusuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_idusuario_seq', 33, true);


--
-- Name: conversor conversor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conversor
    ADD CONSTRAINT conversor_pkey PRIMARY KEY (id);


--
-- Name: documentacion documentacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.documentacion
    ADD CONSTRAINT documentacion_pkey PRIMARY KEY (id);


--
-- Name: invitacion invitacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invitacion
    ADD CONSTRAINT invitacion_pkey PRIMARY KEY (id);


--
-- Name: miembro miembro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT miembro_pkey PRIMARY KEY (idmiembro);


--
-- Name: permiso permiso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso
    ADD CONSTRAINT permiso_pkey PRIMARY KEY (idpermiso);


--
-- Name: proyecto proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto
    ADD CONSTRAINT proyecto_pkey PRIMARY KEY (idproyecto);


--
-- Name: proyectotmp proyectotmp_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyectotmp
    ADD CONSTRAINT proyectotmp_pkey PRIMARY KEY (id);


--
-- Name: reunion reunion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT reunion_pkey PRIMARY KEY (idreunion);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (idrol);


--
-- Name: sprint sprint_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint
    ADD CONSTRAINT sprint_pkey PRIMARY KEY (idsprint);


--
-- Name: tarea tarea_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarea
    ADD CONSTRAINT tarea_pkey PRIMARY KEY (id);


--
-- Name: tmp tmp_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tmp
    ADD CONSTRAINT tmp_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_correo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_correo_key UNIQUE (correo);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (idusuario);


--
-- Name: usuario usuario_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);


--
-- Name: rol fk_permiso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT fk_permiso FOREIGN KEY (idpermiso) REFERENCES public.permiso(idpermiso);


--
-- Name: miembro fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: sprint fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: reunion fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: miembro fk_rol; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_rol FOREIGN KEY (idrol) REFERENCES public.rol(idrol);


--
-- Name: reunion fk_sprint; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT fk_sprint FOREIGN KEY (idsprint) REFERENCES public.sprint(idsprint);


--
-- Name: miembro fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_usuario FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);


--
-- Name: proyecto fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto
    ADD CONSTRAINT fk_usuario FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);


--
-- Name: reunion fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT fk_usuario FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);


--
-- Name: tarea idsprint; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarea
    ADD CONSTRAINT idsprint FOREIGN KEY (id_sprint) REFERENCES public.sprint(idsprint);


--
-- Name: invitacion invitacion_idinvitado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invitacion
    ADD CONSTRAINT invitacion_idinvitado_fkey FOREIGN KEY (idreceptor) REFERENCES public.usuario(idusuario);


--
-- Name: invitacion invitacion_idpo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invitacion
    ADD CONSTRAINT invitacion_idpo_fkey FOREIGN KEY (idemisor) REFERENCES public.usuario(idusuario);


--
-- Name: invitacion invitacion_idproyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invitacion
    ADD CONSTRAINT invitacion_idproyecto_fkey FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- PostgreSQL database dump complete
--

