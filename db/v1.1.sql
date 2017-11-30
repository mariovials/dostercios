-- para pasar de la version 1 a la 1.1

ALTER TABLE capitulo ADD COLUMN orden INTEGER NOT NULL DEFAULT 1;
