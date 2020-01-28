# dev_sprint
Sistema que faz o controle das tarefas do Sprint. Apresentando as tarefas e gerenciamento dos colaboradores.

## Sprint
Um sprint é criada definindo a quantidade de dias, tarefas e quem são os desenvolvedores.

Cada tarefa terá um código, título, descrição, data da criação, data do início, data de finalização. 

### Definições das regras:
 - Quando uma tarefa for concluída e a tarefa estiver com o tempo atrazada o usuário deverá informar porque atrasou (dificuldade técnica, estimativa, ou planejamento). 
 - Se escolher dificuldade técnica deverá informar mais detalhes (campo de texto).
 
## POSTGRES

CREATE DATABASE dev_sprint
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Portuguese_Brazil.1252'
       LC_CTYPE = 'Portuguese_Brazil.1252'
       CONNECTION LIMIT = -1;



CREATE SEQUENCE public.colaborador_col_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 3
  CACHE 1;

  
CREATE SEQUENCE public.sprint_spt_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 5
  CACHE 1;

  CREATE SEQUENCE public.tarefa_tar_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 11
  CACHE 1;


  CREATE TABLE public.colaborador (
  col_id integer NOT NULL DEFAULT nextval('colaborador_col_id_seq'::regclass),
  col_nome character varying(50),
  col_login character varying(30),
  col_senha character varying(50),
  col_status boolean,
  col_funcao character varying(50)
)


CREATE TABLE public.dias_sprint (
  data date,
  sprint_id integer,
  CONSTRAINT "FK_sprint_id" FOREIGN KEY (sprint_id)
      REFERENCES public.sprint (spt_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)


CREATE TABLE public.sprint (
  spt_id integer NOT NULL DEFAULT nextval('sprint_spt_id_seq'::regclass),
  spt_nome character varying(30),
  spt_data_inicio date,
  spt_data_fim date,
  spt_qtd_colaborador integer,
  CONSTRAINT pk_sprint_id PRIMARY KEY (spt_id)
)


CREATE TABLE public.tarefa (
  tar_id integer NOT NULL DEFAULT nextval('tarefa_tar_id_seq'::regclass),
  tar_titulo character varying(50),
  tar_descricao text,
  tar_colaborador integer,
  tar_bug boolean,
  tar_tarefa_bug integer,
  tar_data_criacao date,
  tar_data_iniciada date,
  tar_data_finalizada date,
  tar_horas_estimada time with time zone,
  tar_horas_lancada time with time zone,
  tar_sprint integer,
  CONSTRAINT "PK_tarefa" PRIMARY KEY (tar_id)
)