# dev_sprint
Sistema que faz o controle das tarefas do Sprint. Apresentando as tarefas e gerenciamento dos colaboradores.

## Sprint
Um sprint é criada definindo a quantidade de dias, tarefas e quem são os desenvolvedores.

Cada tarefa terá um código, título, descrição, data da criação, data do início, data de finalização. 

### Definições das regras:
 - Quando uma tarefa for concluída e a tarefa estiver com o tempo atrazada o usuário deverá informar porque atrasou (dificuldade técnica, estimativa, ou planejamento). 
 - Se escolher dificuldade técnica deverá informar mais detalhes (campo de texto).
 
## POSTGRES

CREATE TABLE colaborador (
  col_id integer NOT NULL DEFAULT serial,
  col_nome character varying(50),
  col_login character varying(30),
  col_senha character varying(50),
  col_status boolean,
  col_funcao character varying(50)
);

CREATE TABLE public.sprint (
  spt_id integer NOT NULL DEFAULT serial,
  spt_nome character varying(30),
  spt_data_inicio date,
  spt_data_fim date,
  spt_qtd_colaborador integer,
  CONSTRAINT pk_sprint_id PRIMARY KEY (spt_id)
);

CREATE TABLE tarefa (
  tar_id integer NOT NULL DEFAULT serial,
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
  tar_codigo character varying(20),
  CONSTRAINT "PK_tarefa" PRIMARY KEY (tar_id)
);

CREATE TABLE dias_sprint (
  data date,
  sprint_id integer,
  CONSTRAINT "FK_sprint_id" FOREIGN KEY (sprint_id)
      REFERENCES public.sprint (spt_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

1;"Lucas Dourado";"lucas";"6c14da109e294d1e8155be8aa4b1ce8e";TRUE;"desenvolvedor"