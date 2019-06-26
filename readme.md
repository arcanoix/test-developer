#Preguntas SQL

2. ¿Qué instrucción se emplea para eliminar todo el contenido de una
tabla, pero conservando la tabla?

	R = `SQL: DELETE from name_table;`
		`MONGO: db.namecollection.deleteMany({})`

3. Realice el query para cambiar "Rodríguez" por "Ramírez" en la columna
"Apellido" de la tabla "Trabajadores", para todos los datos encontrados.
Tanto en SQL como en Mongodb.

	R = `SQL : UPDATE trabajadores set apellido ="Ramírez" WHERE apellido = "Rodríguez";`
		`MONGO: db.trabajadores.update({apellido:"Rodríguez"},{$set:{apellido:"Ramírez"}},{multi:true})`

4. ¿Puede una tabla tener más de una clave externa o foránea definida?

	R = Si

5. ¿Cuál es el valor más alto que se puede almacenar en un campo de
datos de tipo BYTE?

	R = 255