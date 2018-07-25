

-- para pasar de la version 1.1 a la 1.2

ALTER TABLE publicacion ADD COLUMN autor VARCHAR(512);
ALTER TABLE publicacion ADD COLUMN isbn VARCHAR(32);
ALTER TABLE publicacion ADD COLUMN anio INTEGER;
ALTER TABLE publicacion ADD COLUMN editorial VARCHAR(512);
ALTER TABLE publicacion ADD COLUMN idioma VARCHAR(32);
ALTER TABLE publicacion ADD COLUMN diseno VARCHAR(512);

-- aplicada en prod
