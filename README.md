# dev_sprint
Sistema que faz o controle das tarefas do Sprint. Apresentando as tarefas e gerenciamento dos colaboradores. O nome do sistema foi criado por que na empresa que eu trabalho (Lucas Dourado) temos um arquivo em excel que faz o controle de todas as tarefas do Sprint.
Nesse arquivo conseguimos gerar conclusões sobre os sucessos e fracasso de cada ciclo de desenvolvimento. Conseguimos analisar se as tarefas estão atrasadas ou adiantadas. 
Caso você queira contribur no projeto ou usar o código fonte, fique a vontade. :D


## Sprint
Uma sprint é uma reunião de pessoas envolvidas num projeto para promover um desenvolvimento mais focalizado do projeto. Sprints geralmente duram de uma a três semanas.
O Sprint poderá ter várias tarefas com prioridades e estimativa de tempo diferentes. Com inicio para começar e finalizar. 


# CONFIGURAÇÃO 
## POSTGRES

CREATE TABLE colaborador (
  col_id serial,
  col_nome character varying(50),
  col_login character varying(30),
  col_senha character varying(50),
  col_status boolean,
  col_funcao character varying(50),
  CONSTRAINT pk_colaborador_id PRIMARY KEY (col_id)
);

CREATE TABLE sprint (
  spt_id serial,
  spt_nome character varying(30),
  spt_data_inicio date,
  spt_data_fim date,
  spt_qtd_colaborador integer,
  CONSTRAINT pk_sprint_id PRIMARY KEY (spt_id)
);

CREATE TABLE tarefa (
  tar_id serial,
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

## Ambiente
- Para o desenvolvimento, utilizo o vagrant (1)
- Ver o log no Vagrant ## tail -f /var/log/httpd/error_log
- Acessar via SSH ## cd /var/www/html/test/



(1) - É um software para desenvolvimento virtuais portáteis, utilizando VirtualBox. Para a configuração é criado um arquivo VagrantFile que contém todas as configurações para a criação do ambiente. 
  - PHP: 7.2.26