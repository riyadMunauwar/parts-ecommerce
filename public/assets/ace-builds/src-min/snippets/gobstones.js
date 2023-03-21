define("ace/snippets/gobstones.snippets",["require","exports","module"],function(e,t,n){n.exports='# scope: gobstones\n\n# program\nsnippet program\n	program {\n		${1:// cuerpo...}\n	}\n\n# interactive program\nsnippet interactive program\n	interactive program {\n		${1:INIT} -> { ${2:// cuerpo...} }\n		${3:TIMEOUT(${4:5000}) -> { ${5:// cuerpo...} }\n		${6:K_ENTER} -> { ${7:// cuerpo...} }\n		_ -> {}\n	}\n\n# procedure\nsnippet procedure\n	procedure ${1:Nombre}(${2:parametros}) {\n		${3:// cuerpo...}\n	}\n\n# function\nsnippet function\n	function ${1:nombre}(${2:parametros}) {\n		return (${3:expresi\u00f3n..})\n	}\n\n# return\nsnippet return\n	return (${1:expresi\u00f3n...})\n\n# type\nsnippet type\n	type ${1:Nombre}\n\n# is variant\nsnippet is variant\n	is variant {\n		case ${1:NombreDelValor1} {}\n		case ${2:NombreDelValor2} {}\n		case ${3:NombreDelValor3} {}\n		case ${4:NombreDelValor4} {}\n	}\n\n# is record\nsnippet is record\n	is record {\n		field ${1:campo1} // ${2:Tipo}\n		field ${3:campo2} // ${4:Tipo}\n		field ${5:campo3} // ${6:Tipo}\n		field ${7:campo4} // ${8:Tipo}\n	}\n\n# type _ is variant\nsnippet type _ is variant\n	type ${1:Nombre} is variant {\n		case ${2:NombreDelValor1} {}\n		case ${3:NombreDelValor2} {}\n		case ${4:NombreDelValor3} {}\n		case ${5:NombreDelValor4} {}\n	}\n\n# type _ is record\nsnippet type _ is record\n	type ${1:Nombre} is record {\n		field ${2:campo1} // ${3:Tipo}\n		field ${4:campo2} // ${5:Tipo}\n		field ${6:campo3} // ${7:Tipo}\n		field ${8:campo4} // ${9:Tipo}\n	}\n\n# repeat\nsnippet repeat\n	repeat ${1:cantidad} {\n		${2:// cuerpo...}\n	}\n\n# foreach\nsnippet foreach\n	foreach ${1:\u00edndice} in ${2:lista} {\n		${3:// cuerpo...}\n	}\n\n# while\nsnippet while\n	while (${1?:condici\u00f3n}) {\n		${2:// cuerpo...}\n	}\n\n# if\nsnippet if\n	if (${1?:condici\u00f3n}) {\n		${2:// cuerpo...}\n	}\n\n# elseif\nsnippet elseif\n	elseif (${1?:condici\u00f3n}) {\n		${2:// cuerpo...}\n	}\n\n# else\nsnippet else\n	else {\n		${1:// cuerpo...}\n	}\n\n# if (con else)\nsnippet if (con else)\n	if (${1:condici\u00f3n}) {\n		${2:// cuerpo...}\n	} else {\n		${3:// cuerpo....}\n	}\n\n# if (con elseif)\nsnippet if (con elseif)\n	if (${1:condici\u00f3n}) {\n		${2:// cuerpo...}\n	} elseif (${3:condici\u00f3n}) {\n		${4:// cuerpo...}\n	}\n\n# if (con elseif y else)\nsnippet if (con elseif y else)\n	if (${1:condici\u00f3n}) {\n		${2:// cuerpo...}\n	} elseif (${3:condici\u00f3n}) {\n		${4:// cuerpo...}\n	} else {\n		${5:// cuerpo....}\n	}\n\n# if (con 3 elseif)\nsnippet if (con 3 elseif)\n	if (${1:condici\u00f3n}) {\n		${2:// cuerpo...}\n	} elseif (${3:condici\u00f3n}) {\n		${4:// cuerpo...}\n	} elseif (${5:condici\u00f3n}) {\n		${6:// cuerpo...}\n	} elseif (${7:condici\u00f3n}) {\n		${8:// cuerpo...}\n	}\n\n# choose (2 valores)\nsnippet choose (2 valores)\n	choose\n		${1:Valor1} when (${2:condici\u00f3n})\n		${3:Valor2} otherwise\n\n# choose (2 valores y boom)\nsnippet choose (2 valores y boom)\n	choose\n		${1:Valor1} when (${2:condici\u00f3n})\n		${3:Valor2} when (${4:condici\u00f3n})\n		${5:Valor3} when (${6:condici\u00f3n})\n		${7:Valor4} when (${8:condici\u00f3n})\n		boom("${9:No es un valor v\u00e1lido}") otherwise\n\n# matching (4 valores)\nsnippet matching (4 valores)\n	matching (${1:variable}) select\n		${2:Valor1} on ${3:opci\u00f3n1}\n		${4:Valor2} on ${5:opci\u00f3n2}\n		${6:Valor3} on ${7:opci\u00f3n3}\n		${8:Valor4} on ${9:opci\u00f3n4}\n		boom("${10:No es un valor v\u00e1lido}") otherwise\n\n# select (4 casos)\nsnippet select (4 casos)\n	select\n		${1:Valor1} on (${2:opci\u00f3n1})\n		${3:Valor2} on (${4:opci\u00f3n2})\n		${5:Valor3} on (${6:opci\u00f3n3})\n		${7:Valor4} on (${8:opci\u00f3n4})\n		boom("${9:No es un valor v\u00e1lido}") otherwise\n\n# switch\nsnippet switch\n	switch (${1:variable}) {\n		${2:Valor1} -> {${3:// cuerpo...}}\n		${4:Valor2} -> {${5:// cuerpo...}}\n		${6:Valor3} -> {${7:// cuerpo...}}\n		${8:Valor4} -> {${9:// cuerpo...}}\n		_ -> {${10:// cuerpo...}}\n	}\n\n# Poner\nsnippet Poner\n	Poner(${1:color})\n\n# Sacar\nsnippet Sacar\n	Sacar(${1:color})\n\n# Mover\nsnippet Mover\n	Mover(${1:direcci\u00f3n})\n\n# IrAlBorde\nsnippet IrAlBorde\n	IrAlBorde(${1:direcci\u00f3n})\n\n# VaciarTablero\nsnippet VaciarTablero\n	VaciarTablero()\n\n# BOOM\nsnippet BOOM\n	BOOM("${1:Mensaje de error}")\n\n# hayBolitas\nsnippet hayBolitas\n	hayBolitas(${1:color})\n\n# nroBolitas\nsnippet nroBolitas\n	nroBolitas(${1:color})\n\n# puedeMover\nsnippet puedeMover\n	puedeMover(${1:direcci\u00f3n})\n\n# siguiente\nsnippet siguiente\n	siguiente(${1:color|direcci\u00f3n})\n\n# previo\nsnippet previo\n	previo(${1:color|direcci\u00f3n})\n\n# opuesto\nsnippet opuesto\n	opuesto(${1:direcci\u00f3n})\n\n# minDir\nsnippet minDir\n	minDir()\n\n# maxDir\nsnippet maxDir\n	maxDir()\n\n# minColor\nsnippet minColor\n	minDir()\n\n# maxColor\nsnippet maxColor\n	maxDir()\n\n# minBool\nsnippet minBool\n	minBool()\n\n# maxBool\nsnippet maxBool\n	maxBool()\n\n# primero\nsnippet primero\n	primero(${1:lista})\n\n# sinElPrimero\nsnippet sinElPrimero\n	sinElPrimero(${1:lista})\n\n# esVac\u00eda\nsnippet esVac\u00eda\n	esVac\u00eda(${1:lista})\n\n# boom\nsnippet boom\n	boom("${1:Mensaje de error}")\n\n# Azul\nsnippet Azul\n	Azul\n\n# Negro\nsnippet Negro\n	Negro\n\n# Rojo\nsnippet Rojo\n	Rojo\n\n# Verde\nsnippet Verde\n	Verde\n\n# Norte\nsnippet Norte\n	Norte\n\n# Este\nsnippet Este\n	Este\n\n# Sur\nsnippet Sur\n	Sur\n\n# Oeste\nsnippet Oeste\n	Oeste\n\n# True\nsnippet True\n	True\n\n# False\nsnippet False\n	False\n\n# INIT\nsnippet INIT\n	INIT -> {$1:// cuerpo...}\n\n# TIMEOUT\nsnippet TIMEOUT\n	TIMEOUT(${1:5000}) -> {$2:// cuerpo...}\n\n# K_A\nsnippet K_A\n	K_A -> { ${1://cuerpo...} }\n# K_CTRL_A\nsnippet K_CTRL_A\n	K_CTRL_A -> { ${1://cuerpo...} }\n# K_ALT_A\nsnippet K_ALT_A\n	K_ALT_A -> { ${1://cuerpo...} }\n# K_SHIFT_A\nsnippet K_SHIFT_A\n	K_SHIFT_A -> { ${1://cuerpo...} }\n# K_CTRL_ALT_A\nsnippet K_CTRL_ALT_A\n	K_CTRL_ALT_A -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_A\nsnippet K_CTRL_SHIFT_A\n	K_CTRL_SHIFT_A -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_A\nsnippet K_CTRL_ALT_SHIFT_A\n	K_CTRL_ALT_SHIFT_A -> { ${1://cuerpo...} }\n\n# K_B\nsnippet K_B\n	K_B -> { ${1://cuerpo...} }\n# K_CTRL_B\nsnippet K_CTRL_B\n	K_CTRL_B -> { ${1://cuerpo...} }\n# K_ALT_B\nsnippet K_ALT_B\n	K_ALT_B -> { ${1://cuerpo...} }\n# K_SHIFT_B\nsnippet K_SHIFT_B\n	K_SHIFT_B -> { ${1://cuerpo...} }\n# K_CTRL_ALT_B\nsnippet K_CTRL_ALT_B\n	K_CTRL_ALT_B -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_B\nsnippet K_CTRL_SHIFT_B\n	K_CTRL_SHIFT_B -> { ${1://cuerpo...} }\n# K_ALT_SHIFT_C\nsnippet K_ALT_SHIFT_C\n	K_ALT_SHIFT_C -> { ${1://cuerpo...} }\n# K_CTRL_BLT_SHIFT_B\nsnippet K_CTRL_BLT_SHIFT_B\n	K_CTRL_ALT_SHIFT_B -> { ${1://cuerpo...} }\n\n# K_C\nsnippet K_C\n	K_C -> { ${1://cuerpo...} }\n# K_CTRL_C\nsnippet K_CTRL_C\n	K_CTRL_C -> { ${1://cuerpo...} }\n# K_ALT_C\nsnippet K_ALT_C\n	K_ALT_C -> { ${1://cuerpo...} }\n# K_SHIFT_C\nsnippet K_SHIFT_C\n	K_SHIFT_C -> { ${1://cuerpo...} }\n# K_CTRL_ALT_C\nsnippet K_CTRL_ALT_C\n	K_CTRL_ALT_C -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_C\nsnippet K_CTRL_SHIFT_C\n	K_CTRL_SHIFT_C -> { ${1://cuerpo...} }\n# K_ALT_SHIFT_C\nsnippet K_ALT_SHIFT_C\n	K_ALT_SHIFT_C -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_C\nsnippet K_CTRL_ALT_SHIFT_C\n	K_CTRL_ALT_SHIFT_C -> { ${1://cuerpo...} }\n\n# K_D\nsnippet K_D\n	K_D -> { ${1://cuerpo...} }\n# K_CTRL_D\nsnippet K_CTRL_D\n	K_CTRL_D -> { ${1://cuerpo...} }\n# K_ALT_D\nsnippet K_ALT_D\n	K_DLT_D -> { ${1://cuerpo...} }\n# K_SHIFT_D\nsnippet K_SHIFT_D\n	K_SHIFT_D -> { ${1://cuerpo...} }\n# K_CTRL_ALT_D\nsnippet K_CTRL_ALT_D\n	K_CTRL_DLT_D -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_D\nsnippet K_CTRL_SHIFT_D\n	K_CTRL_SHIFT_D -> { ${1://cuerpo...} }\n# K_ALT_SHIFT_D\nsnippet K_ALT_SHIFT_D\n	K_ALT_SHIFT_D -> { ${1://cuerpo...} }\n# K_CTRL_DLT_SHIFT_D\nsnippet K_CTRL_DLT_SHIFT_D\n	K_CTRL_ALT_SHIFT_D -> { ${1://cuerpo...} }\n\n# K_E\nsnippet K_E\n	K_E -> { ${1://cuerpo...} }\n# K_CTRL_E\nsnippet K_CTRL_E\n	K_CTRL_E -> { ${1://cuerpo...} }\n# K_ALT_E\nsnippet K_ALT_E\n	K_ALT_E -> { ${1://cuerpo...} }\n# K_SHIFT_E\nsnippet K_SHIFT_E\n	K_SHIFT_E -> { ${1://cuerpo...} }\n# K_CTRL_ALT_E\nsnippet K_CTRL_ALT_E\n	K_CTRL_ALT_E -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_E\nsnippet K_CTRL_SHIFT_E\n	K_CTRL_SHIFT_E -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_E\nsnippet K_CTRL_ALT_SHIFT_E\n	K_CTRL_ALT_SHIFT_E -> { ${1://cuerpo...} }\n\n# K_F\nsnippet K_F\n	K_F -> { ${1://cuerpo...} }\n# K_CTRL_F\nsnippet K_CTRL_F\n	K_CTRL_F -> { ${1://cuerpo...} }\n# K_ALT_F\nsnippet K_ALT_F\n	K_ALT_F -> { ${1://cuerpo...} }\n# K_SHIFT_F\nsnippet K_SHIFT_F\n	K_SHIFT_F -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F\nsnippet K_CTRL_ALT_F\n	K_CTRL_ALT_F -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F\nsnippet K_CTRL_SHIFT_F\n	K_CTRL_SHIFT_F -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F\nsnippet K_CTRL_ALT_SHIFT_F\n	K_CTRL_ALT_SHIFT_F -> { ${1://cuerpo...} }\n\n# K_G\nsnippet K_G\n	K_G -> { ${1://cuerpo...} }\n# K_CTRL_G\nsnippet K_CTRL_G\n	K_CTRL_G -> { ${1://cuerpo...} }\n# K_ALT_G\nsnippet K_ALT_G\n	K_ALT_G -> { ${1://cuerpo...} }\n# K_SHIFT_G\nsnippet K_SHIFT_G\n	K_SHIFT_G -> { ${1://cuerpo...} }\n# K_CTRL_ALT_G\nsnippet K_CTRL_ALT_G\n	K_CTRL_ALT_G -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_G\nsnippet K_CTRL_SHIFT_G\n	K_CTRL_SHIFT_G -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_G\nsnippet K_CTRL_ALT_SHIFT_G\n	K_CTRL_ALT_SHIFT_G -> { ${1://cuerpo...} }\n\n# K_H\nsnippet K_H\n	K_H -> { ${1://cuerpo...} }\n# K_CTRL_H\nsnippet K_CTRL_H\n	K_CTRL_H -> { ${1://cuerpo...} }\n# K_ALT_H\nsnippet K_ALT_H\n	K_ALT_H -> { ${1://cuerpo...} }\n# K_SHIFT_H\nsnippet K_SHIFT_H\n	K_SHIFT_H -> { ${1://cuerpo...} }\n# K_CTRL_ALT_H\nsnippet K_CTRL_ALT_H\n	K_CTRL_ALT_H -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_H\nsnippet K_CTRL_SHIFT_H\n	K_CTRL_SHIFT_H -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_H\nsnippet K_CTRL_ALT_SHIFT_H\n	K_CTRL_ALT_SHIFT_H -> { ${1://cuerpo...} }\n\n# K_I\nsnippet K_I\n	K_I -> { ${1://cuerpo...} }\n# K_CTRL_I\nsnippet K_CTRL_I\n	K_CTRL_I -> { ${1://cuerpo...} }\n# K_ALT_I\nsnippet K_ALT_I\n	K_ALT_I -> { ${1://cuerpo...} }\n# K_SHIFT_I\nsnippet K_SHIFT_I\n	K_SHIFT_I -> { ${1://cuerpo...} }\n# K_CTRL_ALT_I\nsnippet K_CTRL_ALT_I\n	K_CTRL_ALT_I -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_I\nsnippet K_CTRL_SHIFT_I\n	K_CTRL_SHIFT_I -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_I\nsnippet K_CTRL_ALT_SHIFT_I\n	K_CTRL_ALT_SHIFT_I -> { ${1://cuerpo...} }\n\n# K_J\nsnippet K_J\n	K_J -> { ${1://cuerpo...} }\n# K_CTRL_J\nsnippet K_CTRL_J\n	K_CTRL_J -> { ${1://cuerpo...} }\n# K_ALT_J\nsnippet K_ALT_J\n	K_ALT_J -> { ${1://cuerpo...} }\n# K_SHIFT_J\nsnippet K_SHIFT_J\n	K_SHIFT_J -> { ${1://cuerpo...} }\n# K_CTRL_ALT_J\nsnippet K_CTRL_ALT_J\n	K_CTRL_ALT_J -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_J\nsnippet K_CTRL_SHIFT_J\n	K_CTRL_SHIFT_J -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_J\nsnippet K_CTRL_ALT_SHIFT_J\n	K_CTRL_ALT_SHIFT_J -> { ${1://cuerpo...} }\n\n# K_K\nsnippet K_K\n	K_K -> { ${1://cuerpo...} }\n# K_CTRL_K\nsnippet K_CTRL_K\n	K_CTRL_K -> { ${1://cuerpo...} }\n# K_ALT_K\nsnippet K_ALT_K\n	K_ALT_K -> { ${1://cuerpo...} }\n# K_SHIFT_K\nsnippet K_SHIFT_K\n	K_SHIFT_K -> { ${1://cuerpo...} }\n# K_CTRL_ALT_K\nsnippet K_CTRL_ALT_K\n	K_CTRL_ALT_K -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_K\nsnippet K_CTRL_SHIFT_K\n	K_CTRL_SHIFT_K -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_K\nsnippet K_CTRL_ALT_SHIFT_K\n	K_CTRL_ALT_SHIFT_K -> { ${1://cuerpo...} }\n\n# K_L\nsnippet K_L\n	K_L -> { ${1://cuerpo...} }\n# K_CTRL_L\nsnippet K_CTRL_L\n	K_CTRL_L -> { ${1://cuerpo...} }\n# K_ALT_L\nsnippet K_ALT_L\n	K_ALT_L -> { ${1://cuerpo...} }\n# K_SHIFT_L\nsnippet K_SHIFT_L\n	K_SHIFT_L -> { ${1://cuerpo...} }\n# K_CTRL_ALT_L\nsnippet K_CTRL_ALT_L\n	K_CTRL_ALT_L -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_L\nsnippet K_CTRL_SHIFT_L\n	K_CTRL_SHIFT_L -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_L\nsnippet K_CTRL_ALT_SHIFT_L\n	K_CTRL_ALT_SHIFT_L -> { ${1://cuerpo...} }\n\n# K_M\nsnippet K_M\n	K_M -> { ${1://cuerpo...} }\n# K_CTRL_M\nsnippet K_CTRL_M\n	K_CTRL_M -> { ${1://cuerpo...} }\n# K_ALT_M\nsnippet K_ALT_M\n	K_ALT_M -> { ${1://cuerpo...} }\n# K_SHIFT_M\nsnippet K_SHIFT_M\n	K_SHIFT_M -> { ${1://cuerpo...} }\n# K_CTRL_ALT_M\nsnippet K_CTRL_ALT_M\n	K_CTRL_ALT_M -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_M\nsnippet K_CTRL_SHIFT_M\n	K_CTRL_SHIFT_M -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_M\nsnippet K_CTRL_ALT_SHIFT_M\n	K_CTRL_ALT_SHIFT_M -> { ${1://cuerpo...} }\n\n# K_N\nsnippet K_N\n	K_N -> { ${1://cuerpo...} }\n# K_CTRL_N\nsnippet K_CTRL_N\n	K_CTRL_N -> { ${1://cuerpo...} }\n# K_ALT_N\nsnippet K_ALT_N\n	K_ALT_N -> { ${1://cuerpo...} }\n# K_SHIFT_N\nsnippet K_SHIFT_N\n	K_SHIFT_N -> { ${1://cuerpo...} }\n# K_CTRL_ALT_N\nsnippet K_CTRL_ALT_N\n	K_CTRL_ALT_N -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_N\nsnippet K_CTRL_SHIFT_N\n	K_CTRL_SHIFT_N -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_N\nsnippet K_CTRL_ALT_SHIFT_N\n	K_CTRL_ALT_SHIFT_N -> { ${1://cuerpo...} }\n\n# K_\u00d1\nsnippet K_\u00d1\n	K_\u00d1 -> { ${1://cuerpo...} }\n# K_CTRL_\u00d1\nsnippet K_CTRL_\u00d1\n	K_CTRL_\u00d1 -> { ${1://cuerpo...} }\n# K_ALT_\u00d1\nsnippet K_ALT_\u00d1\n	K_ALT_\u00d1 -> { ${1://cuerpo...} }\n# K_SHIFT_\u00d1\nsnippet K_SHIFT_\u00d1\n	K_SHIFT_\u00d1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_\u00d1\nsnippet K_CTRL_ALT_\u00d1\n	K_CTRL_ALT_\u00d1 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_\u00d1\nsnippet K_CTRL_SHIFT_\u00d1\n	K_CTRL_SHIFT_\u00d1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_\u00d1\nsnippet K_CTRL_ALT_SHIFT_\u00d1\n	K_CTRL_ALT_SHIFT_\u00d1 -> { ${1://cuerpo...} }\n\n# K_O\nsnippet K_O\n	K_O -> { ${1://cuerpo...} }\n# K_CTRL_O\nsnippet K_CTRL_O\n	K_CTRL_O -> { ${1://cuerpo...} }\n# K_ALT_O\nsnippet K_ALT_O\n	K_ALT_O -> { ${1://cuerpo...} }\n# K_SHIFT_O\nsnippet K_SHIFT_O\n	K_SHIFT_O -> { ${1://cuerpo...} }\n# K_CTRL_ALT_O\nsnippet K_CTRL_ALT_O\n	K_CTRL_ALT_O -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_O\nsnippet K_CTRL_SHIFT_O\n	K_CTRL_SHIFT_O -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_O\nsnippet K_CTRL_ALT_SHIFT_O\n	K_CTRL_ALT_SHIFT_O -> { ${1://cuerpo...} }\n\n# K_P\nsnippet K_P\n	K_P -> { ${1://cuerpo...} }\n# K_CTRL_P\nsnippet K_CTRL_P\n	K_CTRL_P -> { ${1://cuerpo...} }\n# K_ALT_P\nsnippet K_ALT_P\n	K_ALT_P -> { ${1://cuerpo...} }\n# K_SHIFT_P\nsnippet K_SHIFT_P\n	K_SHIFT_P -> { ${1://cuerpo...} }\n# K_CTRL_ALT_P\nsnippet K_CTRL_ALT_P\n	K_CTRL_ALT_P -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_P\nsnippet K_CTRL_SHIFT_P\n	K_CTRL_SHIFT_P -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_P\nsnippet K_CTRL_ALT_SHIFT_P\n	K_CTRL_ALT_SHIFT_P -> { ${1://cuerpo...} }\n\n# K_Q\nsnippet K_Q\n	K_Q -> { ${1://cuerpo...} }\n# K_CTRL_Q\nsnippet K_CTRL_Q\n	K_CTRL_Q -> { ${1://cuerpo...} }\n# K_ALT_Q\nsnippet K_ALT_Q\n	K_ALT_Q -> { ${1://cuerpo...} }\n# K_SHIFT_Q\nsnippet K_SHIFT_Q\n	K_SHIFT_Q -> { ${1://cuerpo...} }\n# K_CTRL_ALT_Q\nsnippet K_CTRL_ALT_Q\n	K_CTRL_ALT_Q -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_Q\nsnippet K_CTRL_SHIFT_Q\n	K_CTRL_SHIFT_Q -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_Q\nsnippet K_CTRL_ALT_SHIFT_Q\n	K_CTRL_ALT_SHIFT_Q -> { ${1://cuerpo...} }\n\n# K_R\nsnippet K_R\n	K_R -> { ${1://cuerpo...} }\n# K_CTRL_R\nsnippet K_CTRL_R\n	K_CTRL_R -> { ${1://cuerpo...} }\n# K_ALT_R\nsnippet K_ALT_R\n	K_ALT_R -> { ${1://cuerpo...} }\n# K_SHIFT_R\nsnippet K_SHIFT_R\n	K_SHIFT_R -> { ${1://cuerpo...} }\n# K_CTRL_ALT_R\nsnippet K_CTRL_ALT_R\n	K_CTRL_ALT_R -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_R\nsnippet K_CTRL_SHIFT_R\n	K_CTRL_SHIFT_R -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_R\nsnippet K_CTRL_ALT_SHIFT_R\n	K_CTRL_ALT_SHIFT_R -> { ${1://cuerpo...} }\n\n# K_S\nsnippet K_S\n	K_S -> { ${1://cuerpo...} }\n# K_CTRL_S\nsnippet K_CTRL_S\n	K_CTRL_S -> { ${1://cuerpo...} }\n# K_ALT_S\nsnippet K_ALT_S\n	K_ALT_S -> { ${1://cuerpo...} }\n# K_SHIFT_S\nsnippet K_SHIFT_S\n	K_SHIFT_S -> { ${1://cuerpo...} }\n# K_CTRL_ALT_S\nsnippet K_CTRL_ALT_S\n	K_CTRL_ALT_S -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_S\nsnippet K_CTRL_SHIFT_S\n	K_CTRL_SHIFT_S -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_S\nsnippet K_CTRL_ALT_SHIFT_S\n	K_CTRL_ALT_SHIFT_S -> { ${1://cuerpo...} }\n\n# K_T\nsnippet K_T\n	K_T -> { ${1://cuerpo...} }\n# K_CTRL_T\nsnippet K_CTRL_T\n	K_CTRL_T -> { ${1://cuerpo...} }\n# K_ALT_T\nsnippet K_ALT_T\n	K_ALT_T -> { ${1://cuerpo...} }\n# K_SHIFT_T\nsnippet K_SHIFT_T\n	K_SHIFT_T -> { ${1://cuerpo...} }\n# K_CTRL_ALT_T\nsnippet K_CTRL_ALT_T\n	K_CTRL_ALT_T -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_T\nsnippet K_CTRL_SHIFT_T\n	K_CTRL_SHIFT_T -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_T\nsnippet K_CTRL_ALT_SHIFT_T\n	K_CTRL_ALT_SHIFT_T -> { ${1://cuerpo...} }\n\n# K_U\nsnippet K_U\n	K_U -> { ${1://cuerpo...} }\n# K_CTRL_U\nsnippet K_CTRL_U\n	K_CTRL_U -> { ${1://cuerpo...} }\n# K_ALT_U\nsnippet K_ALT_U\n	K_ALT_U -> { ${1://cuerpo...} }\n# K_SHIFT_U\nsnippet K_SHIFT_U\n	K_SHIFT_U -> { ${1://cuerpo...} }\n# K_CTRL_ALT_U\nsnippet K_CTRL_ALT_U\n	K_CTRL_ALT_U -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_U\nsnippet K_CTRL_SHIFT_U\n	K_CTRL_SHIFT_U -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_U\nsnippet K_CTRL_ALT_SHIFT_U\n	K_CTRL_ALT_SHIFT_U -> { ${1://cuerpo...} }\n\n# K_V\nsnippet K_V\n	K_V -> { ${1://cuerpo...} }\n# K_CTRL_V\nsnippet K_CTRL_V\n	K_CTRL_V -> { ${1://cuerpo...} }\n# K_ALT_V\nsnippet K_ALT_V\n	K_ALT_V -> { ${1://cuerpo...} }\n# K_SHIFT_V\nsnippet K_SHIFT_V\n	K_SHIFT_V -> { ${1://cuerpo...} }\n# K_CTRL_ALT_V\nsnippet K_CTRL_ALT_V\n	K_CTRL_ALT_V -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_V\nsnippet K_CTRL_SHIFT_V\n	K_CTRL_SHIFT_V -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_V\nsnippet K_CTRL_ALT_SHIFT_V\n	K_CTRL_ALT_SHIFT_V -> { ${1://cuerpo...} }\n\n# K_W\nsnippet K_W\n	K_W -> { ${1://cuerpo...} }\n# K_CTRL_W\nsnippet K_CTRL_W\n	K_CTRL_W -> { ${1://cuerpo...} }\n# K_ALT_W\nsnippet K_ALT_W\n	K_ALT_W -> { ${1://cuerpo...} }\n# K_SHIFT_W\nsnippet K_SHIFT_W\n	K_SHIFT_W -> { ${1://cuerpo...} }\n# K_CTRL_ALT_W\nsnippet K_CTRL_ALT_W\n	K_CTRL_ALT_W -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_W\nsnippet K_CTRL_SHIFT_W\n	K_CTRL_SHIFT_W -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_W\nsnippet K_CTRL_ALT_SHIFT_W\n	K_CTRL_ALT_SHIFT_W -> { ${1://cuerpo...} }\n\n# K_X\nsnippet K_X\n	K_X -> { ${1://cuerpo...} }\n# K_CTRL_X\nsnippet K_CTRL_X\n	K_CTRL_X -> { ${1://cuerpo...} }\n# K_ALT_X\nsnippet K_ALT_X\n	K_ALT_X -> { ${1://cuerpo...} }\n# K_SHIFT_X\nsnippet K_SHIFT_X\n	K_SHIFT_X -> { ${1://cuerpo...} }\n# K_CTRL_ALT_X\nsnippet K_CTRL_ALT_X\n	K_CTRL_ALT_X -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_X\nsnippet K_CTRL_SHIFT_X\n	K_CTRL_SHIFT_X -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_X\nsnippet K_CTRL_ALT_SHIFT_X\n	K_CTRL_ALT_SHIFT_X -> { ${1://cuerpo...} }\n\n# K_Y\nsnippet K_Y\n	K_Y -> { ${1://cuerpo...} }\n# K_CTRL_Y\nsnippet K_CTRL_Y\n	K_CTRL_Y -> { ${1://cuerpo...} }\n# K_ALT_Y\nsnippet K_ALT_Y\n	K_ALT_Y -> { ${1://cuerpo...} }\n# K_SHIFT_Y\nsnippet K_SHIFT_Y\n	K_SHIFT_Y -> { ${1://cuerpo...} }\n# K_CTRL_ALT_Y\nsnippet K_CTRL_ALT_Y\n	K_CTRL_ALT_Y -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_Y\nsnippet K_CTRL_SHIFT_Y\n	K_CTRL_SHIFT_Y -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_Y\nsnippet K_CTRL_ALT_SHIFT_Y\n	K_CTRL_ALT_SHIFT_Y -> { ${1://cuerpo...} }\n\n# K_Z\nsnippet K_Z\n	K_Z -> { ${1://cuerpo...} }\n# K_CTRL_Z\nsnippet K_CTRL_Z\n	K_CTRL_Z -> { ${1://cuerpo...} }\n# K_ALT_Z\nsnippet K_ALT_Z\n	K_ALT_Z -> { ${1://cuerpo...} }\n# K_SHIFT_Z\nsnippet K_SHIFT_Z\n	K_SHIFT_Z -> { ${1://cuerpo...} }\n# K_CTRL_ALT_Z\nsnippet K_CTRL_ALT_Z\n	K_CTRL_ALT_Z -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_Z\nsnippet K_CTRL_SHIFT_Z\n	K_CTRL_SHIFT_Z -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_Z\nsnippet K_CTRL_ALT_SHIFT_Z\n	K_CTRL_ALT_SHIFT_Z -> { ${1://cuerpo...} }\n\n# K_0\nsnippet K_0\n	K_0 -> { ${1://cuerpo...} }\n# K_CTRL_0\nsnippet K_CTRL_0\n	K_CTRL_0 -> { ${1://cuerpo...} }\n# K_ALT_0\nsnippet K_ALT_0\n	K_ALT_0 -> { ${1://cuerpo...} }\n# K_SHIFT_0\nsnippet K_SHIFT_0\n	K_SHIFT_0 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_0\nsnippet K_CTRL_ALT_0\n	K_CTRL_ALT_0 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_0\nsnippet K_CTRL_SHIFT_0\n	K_CTRL_SHIFT_0 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_0\nsnippet K_CTRL_ALT_SHIFT_0\n	K_CTRL_ALT_SHIFT_0 -> { ${1://cuerpo...} }\n\n# K_1\nsnippet K_1\n	K_1 -> { ${1://cuerpo...} }\n# K_CTRL_1\nsnippet K_CTRL_1\n	K_CTRL_1 -> { ${1://cuerpo...} }\n# K_ALT_1\nsnippet K_ALT_1\n	K_ALT_1 -> { ${1://cuerpo...} }\n# K_SHIFT_1\nsnippet K_SHIFT_1\n	K_SHIFT_1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_1\nsnippet K_CTRL_ALT_1\n	K_CTRL_ALT_1 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_1\nsnippet K_CTRL_SHIFT_1\n	K_CTRL_SHIFT_1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_1\nsnippet K_CTRL_ALT_SHIFT_1\n	K_CTRL_ALT_SHIFT_1 -> { ${1://cuerpo...} }\n\n# K_2\nsnippet K_2\n	K_2 -> { ${1://cuerpo...} }\n# K_CTRL_2\nsnippet K_CTRL_2\n	K_CTRL_2 -> { ${1://cuerpo...} }\n# K_ALT_2\nsnippet K_ALT_2\n	K_ALT_2 -> { ${1://cuerpo...} }\n# K_SHIFT_2\nsnippet K_SHIFT_2\n	K_SHIFT_2 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_2\nsnippet K_CTRL_ALT_2\n	K_CTRL_ALT_2 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_2\nsnippet K_CTRL_SHIFT_2\n	K_CTRL_SHIFT_2 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_2\nsnippet K_CTRL_ALT_SHIFT_2\n	K_CTRL_ALT_SHIFT_2 -> { ${1://cuerpo...} }\n\n# K_3\nsnippet K_3\n	K_3 -> { ${1://cuerpo...} }\n# K_CTRL_3\nsnippet K_CTRL_3\n	K_CTRL_3 -> { ${1://cuerpo...} }\n# K_ALT_3\nsnippet K_ALT_3\n	K_ALT_3 -> { ${1://cuerpo...} }\n# K_SHIFT_3\nsnippet K_SHIFT_3\n	K_SHIFT_3 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_3\nsnippet K_CTRL_ALT_3\n	K_CTRL_ALT_3 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_3\nsnippet K_CTRL_SHIFT_3\n	K_CTRL_SHIFT_3 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_3\nsnippet K_CTRL_ALT_SHIFT_3\n	K_CTRL_ALT_SHIFT_3 -> { ${1://cuerpo...} }\n\n# K_4\nsnippet K_4\n	K_4 -> { ${1://cuerpo...} }\n# K_CTRL_4\nsnippet K_CTRL_4\n	K_CTRL_4 -> { ${1://cuerpo...} }\n# K_ALT_4\nsnippet K_ALT_4\n	K_ALT_4 -> { ${1://cuerpo...} }\n# K_SHIFT_4\nsnippet K_SHIFT_4\n	K_SHIFT_4 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_4\nsnippet K_CTRL_ALT_4\n	K_CTRL_ALT_4 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_4\nsnippet K_CTRL_SHIFT_4\n	K_CTRL_SHIFT_4 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_4\nsnippet K_CTRL_ALT_SHIFT_4\n	K_CTRL_ALT_SHIFT_4 -> { ${1://cuerpo...} }\n\n# K_5\nsnippet K_5\n	K_5 -> { ${1://cuerpo...} }\n# K_CTRL_5\nsnippet K_CTRL_5\n	K_CTRL_5 -> { ${1://cuerpo...} }\n# K_ALT_5\nsnippet K_ALT_5\n	K_ALT_5 -> { ${1://cuerpo...} }\n# K_SHIFT_5\nsnippet K_SHIFT_5\n	K_SHIFT_5 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_5\nsnippet K_CTRL_ALT_5\n	K_CTRL_ALT_5 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_5\nsnippet K_CTRL_SHIFT_5\n	K_CTRL_SHIFT_5 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_5\nsnippet K_CTRL_ALT_SHIFT_5\n	K_CTRL_ALT_SHIFT_5 -> { ${1://cuerpo...} }\n\n# K_6\nsnippet K_6\n	K_6 -> { ${1://cuerpo...} }\n# K_CTRL_6\nsnippet K_CTRL_6\n	K_CTRL_6 -> { ${1://cuerpo...} }\n# K_ALT_6\nsnippet K_ALT_6\n	K_ALT_6 -> { ${1://cuerpo...} }\n# K_SHIFT_6\nsnippet K_SHIFT_6\n	K_SHIFT_6 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_6\nsnippet K_CTRL_ALT_6\n	K_CTRL_ALT_6 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_6\nsnippet K_CTRL_SHIFT_6\n	K_CTRL_SHIFT_6 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_6\nsnippet K_CTRL_ALT_SHIFT_6\n	K_CTRL_ALT_SHIFT_6 -> { ${1://cuerpo...} }\n\n# K_7\nsnippet K_7\n	K_7 -> { ${1://cuerpo...} }\n# K_CTRL_7\nsnippet K_CTRL_7\n	K_CTRL_7 -> { ${1://cuerpo...} }\n# K_ALT_7\nsnippet K_ALT_7\n	K_ALT_7 -> { ${1://cuerpo...} }\n# K_SHIFT_7\nsnippet K_SHIFT_7\n	K_SHIFT_7 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_7\nsnippet K_CTRL_ALT_7\n	K_CTRL_ALT_7 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_7\nsnippet K_CTRL_SHIFT_7\n	K_CTRL_SHIFT_7 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_7\nsnippet K_CTRL_ALT_SHIFT_7\n	K_CTRL_ALT_SHIFT_7 -> { ${1://cuerpo...} }\n\n# K_8\nsnippet K_8\n	K_8 -> { ${1://cuerpo...} }\n# K_CTRL_8\nsnippet K_CTRL_8\n	K_CTRL_8 -> { ${1://cuerpo...} }\n# K_ALT_8\nsnippet K_ALT_8\n	K_ALT_8 -> { ${1://cuerpo...} }\n# K_SHIFT_8\nsnippet K_SHIFT_8\n	K_SHIFT_8 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_8\nsnippet K_CTRL_ALT_8\n	K_CTRL_ALT_8 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_8\nsnippet K_CTRL_SHIFT_8\n	K_CTRL_SHIFT_8 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_8\nsnippet K_CTRL_ALT_SHIFT_8\n	K_CTRL_ALT_SHIFT_8 -> { ${1://cuerpo...} }\n\n# K_9\nsnippet K_9\n	K_9 -> { ${1://cuerpo...} }\n# K_CTRL_9\nsnippet K_CTRL_9\n	K_CTRL_9 -> { ${1://cuerpo...} }\n# K_ALT_9\nsnippet K_ALT_9\n	K_ALT_9 -> { ${1://cuerpo...} }\n# K_SHIFT_9\nsnippet K_SHIFT_9\n	K_SHIFT_9 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_9\nsnippet K_CTRL_ALT_9\n	K_CTRL_ALT_9 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_9\nsnippet K_CTRL_SHIFT_9\n	K_CTRL_SHIFT_9 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_9\nsnippet K_CTRL_ALT_SHIFT_9\n	K_CTRL_ALT_SHIFT_9 -> { ${1://cuerpo...} }\n\n# K_F1\nsnippet K_F1\n	K_F1 -> { ${1://cuerpo...} }\n# K_CTRL_F1\nsnippet K_CTRL_F1\n	K_CTRL_F1 -> { ${1://cuerpo...} }\n# K_ALT_F1\nsnippet K_ALT_F1\n	K_ALT_F1 -> { ${1://cuerpo...} }\n# K_SHIFT_F1\nsnippet K_SHIFT_F1\n	K_SHIFT_F1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F1\nsnippet K_CTRL_ALT_F1\n	K_CTRL_ALT_F1 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F1\nsnippet K_CTRL_SHIFT_F1\n	K_CTRL_SHIFT_F1 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F1\nsnippet K_CTRL_ALT_SHIFT_F1\n	K_CTRL_ALT_SHIFT_F1 -> { ${1://cuerpo...} }\n\n# K_F2\nsnippet K_F2\n	K_F2 -> { ${1://cuerpo...} }\n# K_CTRL_F2\nsnippet K_CTRL_F2\n	K_CTRL_F2 -> { ${1://cuerpo...} }\n# K_ALT_F2\nsnippet K_ALT_F2\n	K_ALT_F2 -> { ${1://cuerpo...} }\n# K_SHIFT_F2\nsnippet K_SHIFT_F2\n	K_SHIFT_F2 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F2\nsnippet K_CTRL_ALT_F2\n	K_CTRL_ALT_F2 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F2\nsnippet K_CTRL_SHIFT_F2\n	K_CTRL_SHIFT_F2 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F2\nsnippet K_CTRL_ALT_SHIFT_F2\n	K_CTRL_ALT_SHIFT_F2 -> { ${1://cuerpo...} }\n\n# K_F3\nsnippet K_F3\n	K_F3 -> { ${1://cuerpo...} }\n# K_CTRL_F3\nsnippet K_CTRL_F3\n	K_CTRL_F3 -> { ${1://cuerpo...} }\n# K_ALT_F3\nsnippet K_ALT_F3\n	K_ALT_F3 -> { ${1://cuerpo...} }\n# K_SHIFT_F3\nsnippet K_SHIFT_F3\n	K_SHIFT_F3 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F3\nsnippet K_CTRL_ALT_F3\n	K_CTRL_ALT_F3 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F3\nsnippet K_CTRL_SHIFT_F3\n	K_CTRL_SHIFT_F3 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F3\nsnippet K_CTRL_ALT_SHIFT_F3\n	K_CTRL_ALT_SHIFT_F3 -> { ${1://cuerpo...} }\n\n# K_A\nsnippet K_A\n	K_A -> { ${1://cuerpo...} }\n# K_CTRL_A\nsnippet K_CTRL_A\n	K_CTRL_A -> { ${1://cuerpo...} }\n# K_ALT_A\nsnippet K_ALT_A\n	K_ALT_A -> { ${1://cuerpo...} }\n# K_SHIFT_A\nsnippet K_SHIFT_A\n	K_SHIFT_A -> { ${1://cuerpo...} }\n# K_CTRL_ALT_A\nsnippet K_CTRL_ALT_A\n	K_CTRL_ALT_A -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_A\nsnippet K_CTRL_SHIFT_A\n	K_CTRL_SHIFT_A -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_A\nsnippet K_CTRL_ALT_SHIFT_A\n	K_CTRL_ALT_SHIFT_A -> { ${1://cuerpo...} }\n\n# K_F5\nsnippet K_F5\n	K_F5 -> { ${1://cuerpo...} }\n# K_CTRL_F5\nsnippet K_CTRL_F5\n	K_CTRL_F5 -> { ${1://cuerpo...} }\n# K_ALT_F5\nsnippet K_ALT_F5\n	K_ALT_F5 -> { ${1://cuerpo...} }\n# K_SHIFT_F5\nsnippet K_SHIFT_F5\n	K_SHIFT_F5 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F5\nsnippet K_CTRL_ALT_F5\n	K_CTRL_ALT_F5 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F5\nsnippet K_CTRL_SHIFT_F5\n	K_CTRL_SHIFT_F5 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F5\nsnippet K_CTRL_ALT_SHIFT_F5\n	K_CTRL_ALT_SHIFT_F5 -> { ${1://cuerpo...} }\n\n# K_F6\nsnippet K_F6\n	K_F6 -> { ${1://cuerpo...} }\n# K_CTRL_F6\nsnippet K_CTRL_F6\n	K_CTRL_F6 -> { ${1://cuerpo...} }\n# K_ALT_F6\nsnippet K_ALT_F6\n	K_ALT_F6 -> { ${1://cuerpo...} }\n# K_SHIFT_F6\nsnippet K_SHIFT_F6\n	K_SHIFT_F6 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F6\nsnippet K_CTRL_ALT_F6\n	K_CTRL_ALT_F6 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F6\nsnippet K_CTRL_SHIFT_F6\n	K_CTRL_SHIFT_F6 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F6\nsnippet K_CTRL_ALT_SHIFT_F6\n	K_CTRL_ALT_SHIFT_F6 -> { ${1://cuerpo...} }\n\n# K_F7\nsnippet K_F7\n	K_F7 -> { ${1://cuerpo...} }\n# K_CTRL_F7\nsnippet K_CTRL_F7\n	K_CTRL_F7 -> { ${1://cuerpo...} }\n# K_ALT_F7\nsnippet K_ALT_F7\n	K_ALT_F7 -> { ${1://cuerpo...} }\n# K_SHIFT_F7\nsnippet K_SHIFT_F7\n	K_SHIFT_F7 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F7\nsnippet K_CTRL_ALT_F7\n	K_CTRL_ALT_F7 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F7\nsnippet K_CTRL_SHIFT_F7\n	K_CTRL_SHIFT_F7 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F7\nsnippet K_CTRL_ALT_SHIFT_F7\n	K_CTRL_ALT_SHIFT_F7 -> { ${1://cuerpo...} }\n\n# K_F8\nsnippet K_F8\n	K_F8 -> { ${1://cuerpo...} }\n# K_CTRL_F8\nsnippet K_CTRL_F8\n	K_CTRL_F8 -> { ${1://cuerpo...} }\n# K_ALT_F8\nsnippet K_ALT_F8\n	K_ALT_F8 -> { ${1://cuerpo...} }\n# K_SHIFT_F8\nsnippet K_SHIFT_F8\n	K_SHIFT_F8 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F8\nsnippet K_CTRL_ALT_F8\n	K_CTRL_ALT_F8 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F8\nsnippet K_CTRL_SHIFT_F8\n	K_CTRL_SHIFT_F8 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F8\nsnippet K_CTRL_ALT_SHIFT_F8\n	K_CTRL_ALT_SHIFT_F8 -> { ${1://cuerpo...} }\n\n# K_F9\nsnippet K_F9\n	K_F9 -> { ${1://cuerpo...} }\n# K_CTRL_F9\nsnippet K_CTRL_F9\n	K_CTRL_F9 -> { ${1://cuerpo...} }\n# K_ALT_F9\nsnippet K_ALT_F9\n	K_ALT_F9 -> { ${1://cuerpo...} }\n# K_SHIFT_F9\nsnippet K_SHIFT_F9\n	K_SHIFT_F9 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F9\nsnippet K_CTRL_ALT_F9\n	K_CTRL_ALT_F9 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F9\nsnippet K_CTRL_SHIFT_F9\n	K_CTRL_SHIFT_F9 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F9\nsnippet K_CTRL_ALT_SHIFT_F9\n	K_CTRL_ALT_SHIFT_F9 -> { ${1://cuerpo...} }\n\n# K_F10\nsnippet K_F10\n	K_F10 -> { ${1://cuerpo...} }\n# K_CTRL_F10\nsnippet K_CTRL_F10\n	K_CTRL_F10 -> { ${1://cuerpo...} }\n# K_ALT_F10\nsnippet K_ALT_F10\n	K_ALT_F10 -> { ${1://cuerpo...} }\n# K_SHIFT_F10\nsnippet K_SHIFT_F10\n	K_SHIFT_F10 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F10\nsnippet K_CTRL_ALT_F10\n	K_CTRL_ALT_F10 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F10\nsnippet K_CTRL_SHIFT_F10\n	K_CTRL_SHIFT_F10 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F10\nsnippet K_CTRL_ALT_SHIFT_F10\n	K_CTRL_ALT_SHIFT_F10 -> { ${1://cuerpo...} }\n\n# K_F11\nsnippet K_F11\n	K_F11 -> { ${1://cuerpo...} }\n# K_CTRL_F11\nsnippet K_CTRL_F11\n	K_CTRL_F11 -> { ${1://cuerpo...} }\n# K_ALT_F11\nsnippet K_ALT_F11\n	K_ALT_F11 -> { ${1://cuerpo...} }\n# K_SHIFT_F11\nsnippet K_SHIFT_F11\n	K_SHIFT_F11 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F11\nsnippet K_CTRL_ALT_F11\n	K_CTRL_ALT_F11 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F11\nsnippet K_CTRL_SHIFT_F11\n	K_CTRL_SHIFT_F11 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F11\nsnippet K_CTRL_ALT_SHIFT_F11\n	K_CTRL_ALT_SHIFT_F11 -> { ${1://cuerpo...} }\n\n# K_F12\nsnippet K_F12\n	K_F12 -> { ${1://cuerpo...} }\n# K_CTRL_F12\nsnippet K_CTRL_F12\n	K_CTRL_F12 -> { ${1://cuerpo...} }\n# K_ALT_F12\nsnippet K_ALT_F12\n	K_ALT_F12 -> { ${1://cuerpo...} }\n# K_SHIFT_F12\nsnippet K_SHIFT_F12\n	K_SHIFT_F12 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_F12\nsnippet K_CTRL_ALT_F12\n	K_CTRL_ALT_F12 -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_F12\nsnippet K_CTRL_SHIFT_F12\n	K_CTRL_SHIFT_F12 -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_F12\nsnippet K_CTRL_ALT_SHIFT_F12\n	K_CTRL_ALT_SHIFT_F12 -> { ${1://cuerpo...} }\n\n# K_RETURN\nsnippet K_RETURN\n	K_RETURN -> { ${1://cuerpo...} }\n# K_CTRL_RETURN\nsnippet K_CTRL_RETURN\n	K_CTRL_RETURN -> { ${1://cuerpo...} }\n# K_ALT_RETURN\nsnippet K_ALT_RETURN\n	K_ALT_RETURN -> { ${1://cuerpo...} }\n# K_SHIFT_RETURN\nsnippet K_SHIFT_RETURN\n	K_SHIFT_RETURN -> { ${1://cuerpo...} }\n# K_CTRL_ALT_RETURN\nsnippet K_CTRL_ALT_RETURN\n	K_CTRL_ALT_RETURN -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_RETURN\nsnippet K_CTRL_SHIFT_RETURN\n	K_CTRL_SHIFT_RETURN -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_RETURN\nsnippet K_CTRL_ALT_SHIFT_RETURN\n	K_CTRL_ALT_SHIFT_RETURN -> { ${1://cuerpo...} }\n\n# K_SPACE\nsnippet K_SPACE\n	K_SPACE -> { ${1://cuerpo...} }\n# K_CTRL_SPACE\nsnippet K_CTRL_SPACE\n	K_CTRL_SPACE -> { ${1://cuerpo...} }\n# K_ALT_SPACE\nsnippet K_ALT_SPACE\n	K_ALT_SPACE -> { ${1://cuerpo...} }\n# K_SHIFT_SPACE\nsnippet K_SHIFT_SPACE\n	K_SHIFT_SPACE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SPACE\nsnippet K_CTRL_ALT_SPACE\n	K_CTRL_ALT_SPACE -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_SPACE\nsnippet K_CTRL_SHIFT_SPACE\n	K_CTRL_SHIFT_SPACE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_SPACE\nsnippet K_CTRL_ALT_SHIFT_SPACE\n	K_CTRL_ALT_SHIFT_SPACE -> { ${1://cuerpo...} }\n\n# K_ESCAPE\nsnippet K_ESCAPE\n	K_ESCAPE -> { ${1://cuerpo...} }\n# K_CTRL_ESCAPE\nsnippet K_CTRL_ESCAPE\n	K_CTRL_ESCAPE -> { ${1://cuerpo...} }\n# K_ALT_ESCAPE\nsnippet K_ALT_ESCAPE\n	K_ALT_ESCAPE -> { ${1://cuerpo...} }\n# K_SHIFT_ESCAPE\nsnippet K_SHIFT_ESCAPE\n	K_SHIFT_ESCAPE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_ESCAPE\nsnippet K_CTRL_ALT_ESCAPE\n	K_CTRL_ALT_ESCAPE -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_ESCAPE\nsnippet K_CTRL_SHIFT_ESCAPE\n	K_CTRL_SHIFT_ESCAPE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_ESCAPE\nsnippet K_CTRL_ALT_SHIFT_ESCAPE\n	K_CTRL_ALT_SHIFT_ESCAPE -> { ${1://cuerpo...} }\n\n# K_BACKSPACE\nsnippet K_BACKSPACE\n	K_BACKSPACE -> { ${1://cuerpo...} }\n# K_CTRL_BACKSPACE\nsnippet K_CTRL_BACKSPACE\n	K_CTRL_BACKSPACE -> { ${1://cuerpo...} }\n# K_ALT_BACKSPACE\nsnippet K_ALT_BACKSPACE\n	K_ALT_BACKSPACE -> { ${1://cuerpo...} }\n# K_SHIFT_BACKSPACE\nsnippet K_SHIFT_BACKSPACE\n	K_SHIFT_BACKSPACE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_BACKSPACE\nsnippet K_CTRL_ALT_BACKSPACE\n	K_CTRL_ALT_BACKSPACE -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_BACKSPACE\nsnippet K_CTRL_SHIFT_BACKSPACE\n	K_CTRL_SHIFT_BACKSPACE -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_BACKSPACE\nsnippet K_CTRL_ALT_SHIFT_BACKSPACE\n	K_CTRL_ALT_SHIFT_BACKSPACE -> { ${1://cuerpo...} }\n\n# K_TAB\nsnippet K_TAB\n	K_TAB -> { ${1://cuerpo...} }\n# K_CTRL_TAB\nsnippet K_CTRL_TAB\n	K_CTRL_TAB -> { ${1://cuerpo...} }\n# K_ALT_TAB\nsnippet K_ALT_TAB\n	K_ALT_TAB -> { ${1://cuerpo...} }\n# K_SHIFT_TAB\nsnippet K_SHIFT_TAB\n	K_SHIFT_TAB -> { ${1://cuerpo...} }\n# K_CTRL_ALT_TAB\nsnippet K_CTRL_ALT_TAB\n	K_CTRL_ALT_TAB -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_TAB\nsnippet K_CTRL_SHIFT_TAB\n	K_CTRL_SHIFT_TAB -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_TAB\nsnippet K_CTRL_ALT_SHIFT_TAB\n	K_CTRL_ALT_SHIFT_TAB -> { ${1://cuerpo...} }\n\n# K_UP\nsnippet K_UP\n	K_UP -> { ${1://cuerpo...} }\n# K_CTRL_UP\nsnippet K_CTRL_UP\n	K_CTRL_UP -> { ${1://cuerpo...} }\n# K_ALT_UP\nsnippet K_ALT_UP\n	K_ALT_UP -> { ${1://cuerpo...} }\n# K_SHIFT_UP\nsnippet K_SHIFT_UP\n	K_SHIFT_UP -> { ${1://cuerpo...} }\n# K_CTRL_ALT_UP\nsnippet K_CTRL_ALT_UP\n	K_CTRL_ALT_UP -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_UP\nsnippet K_CTRL_SHIFT_UP\n	K_CTRL_SHIFT_UP -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_UP\nsnippet K_CTRL_ALT_SHIFT_UP\n	K_CTRL_ALT_SHIFT_UP -> { ${1://cuerpo...} }\n\n# K_DOWN\nsnippet K_DOWN\n	K_DOWN -> { ${1://cuerpo...} }\n# K_CTRL_DOWN\nsnippet K_CTRL_DOWN\n	K_CTRL_DOWN -> { ${1://cuerpo...} }\n# K_ALT_DOWN\nsnippet K_ALT_DOWN\n	K_ALT_DOWN -> { ${1://cuerpo...} }\n# K_SHIFT_DOWN\nsnippet K_SHIFT_DOWN\n	K_SHIFT_DOWN -> { ${1://cuerpo...} }\n# K_CTRL_ALT_DOWN\nsnippet K_CTRL_ALT_DOWN\n	K_CTRL_ALT_DOWN -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_DOWN\nsnippet K_CTRL_SHIFT_DOWN\n	K_CTRL_SHIFT_DOWN -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_DOWN\nsnippet K_CTRL_ALT_SHIFT_DOWN\n	K_CTRL_ALT_SHIFT_DOWN -> { ${1://cuerpo...} }\n\n# K_LEFT\nsnippet K_LEFT\n	K_LEFT -> { ${1://cuerpo...} }\n# K_CTRL_LEFT\nsnippet K_CTRL_LEFT\n	K_CTRL_LEFT -> { ${1://cuerpo...} }\n# K_ALT_LEFT\nsnippet K_ALT_LEFT\n	K_ALT_LEFT -> { ${1://cuerpo...} }\n# K_SHIFT_LEFT\nsnippet K_SHIFT_LEFT\n	K_SHIFT_LEFT -> { ${1://cuerpo...} }\n# K_CTRL_ALT_LEFT\nsnippet K_CTRL_ALT_LEFT\n	K_CTRL_ALT_LEFT -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_LEFT\nsnippet K_CTRL_SHIFT_LEFT\n	K_CTRL_SHIFT_LEFT -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_LEFT\nsnippet K_CTRL_ALT_SHIFT_LEFT\n	K_CTRL_ALT_SHIFT_LEFT -> { ${1://cuerpo...} }\n\n# K_RIGHT\nsnippet K_RIGHT\n	K_RIGHT -> { ${1://cuerpo...} }\n# K_CTRL_RIGHT\nsnippet K_CTRL_RIGHT\n	K_CTRL_RIGHT -> { ${1://cuerpo...} }\n# K_ALT_RIGHT\nsnippet K_ALT_RIGHT\n	K_ALT_RIGHT -> { ${1://cuerpo...} }\n# K_SHIFT_RIGHT\nsnippet K_SHIFT_RIGHT\n	K_SHIFT_RIGHT -> { ${1://cuerpo...} }\n# K_CTRL_ALT_RIGHT\nsnippet K_CTRL_ALT_RIGHT\n	K_CTRL_ALT_RIGHT -> { ${1://cuerpo...} }\n# K_CTRL_SHIFT_RIGHT\nsnippet K_CTRL_SHIFT_RIGHT\n	K_CTRL_SHIFT_RIGHT -> { ${1://cuerpo...} }\n# K_CTRL_ALT_SHIFT_RIGHT\nsnippet K_CTRL_ALT_SHIFT_RIGHT\n	K_CTRL_ALT_SHIFT_RIGHT -> { ${1://cuerpo...} }\n\n# recorrido (simple)\nsnippet recorrido (simple)\n	${1:// Ir al inicio}\n	while (not ${2:// es \u00faltimo elemento}) {\n		${3:// Procesar el elemento}\n		${4:// Ir al pr\u00f3ximo elemento}\n	}\n	${5:// Finalizar}\n\n# recorrido (de acumulaci\u00f3n)\nsnippet recorrido (de acumulaci\u00f3n)\n	${1:// Ir al inicio}\n	${2:cantidadVistos} := ${3:// contar elementos en lugar actual}\n	while (not ${4:// es \u00faltimo elemento}) {\n		${4:// Ir al pr\u00f3ximo elemento}\n		${2:cantidadVistos} := ${2:cantidadVistos} + ${3:// contar elementos en lugar actual}\n	}\n	return (${2:cantidadVistos})\n\n# recorrido (de b\u00fasqueda)\nsnippet recorrido (de b\u00fasqueda)\n	${1:// Ir al inicio}\n	while (not ${2:// encontr\u00e9 lo que buscaba}) {\n		${3:// Ir al pr\u00f3ximo elemento}\n	}\n	return (${2:// encontr\u00e9 lo que buscaba })\n\n# recorrido (de b\u00fasqueda con borde)\nsnippet recorrido (de b\u00fasqueda con borde)\n	${1:// Ir al inicio}\n	while (not ${2:// encontr\u00e9 lo que buscaba} && not ${3:// es \u00faltimo elemento}) {\n		${4:// Ir al pr\u00f3ximo elemento}\n	}\n	return (${2:// encontr\u00e9 lo que buscaba })\n\n# recorrido (de tipos enumerativos)\nsnippet recorrido (de tipos enumerativos)\n	${1:elementoActual} := ${2:minElemento()}\n	while (${1:elementoActual} /= ${3:maxElemento()}) {\n		${4:// Procesar con elemento actual}\n		${1:elementoActual} := siguiente(${1:elementoActual})\n	}\n	${4:// Procesar con elemento actual}\n\n# recorrido (de b\u00fasqueda sobre lista)\nsnippet recorrido (de b\u00fasqueda sobre lista)\n	${1:listaRecorrida} := ${2:lista}\n	while (primero(${1:listaRecorrida}) /= ${3://elemento buscado}) {\n		${1:elementoActual} := sinElPrimero(${1:elementoActual})\n	}\n	return (primero(${1:listaRecorrida}))\n\n# recorrido (de b\u00fasqueda sobre lista con borde)\nsnippet recorrido (de b\u00fasqueda sobre lista con borde)\n	${1:listaRecorrida} := ${2:lista}\n	while (not esVac\u00eda(${1:listaRecorrida}) && primero(${1:listaRecorrida}) /= ${3://elemento buscado}) {\n		${1:elementoActual} := sinElPrimero(${1:elementoActual})\n	}\n	return (not esVac\u00eda(${1:listaRecorrida}))\n\n# docs (procedimiento)\nsnippet docs (procedimiento)\n	/*\n		@PROP\u00d3SITO: ${1:...}\n		@PRECONDICI\u00d3N: ${2:...}\n	*/\n\n# docs (procedimiento con par\u00e1metros)\nsnippet docs (procedimiento con par\u00e1metros)\n	/*\n		@PROP\u00d3SITO: ${1:...}\n		@PRECONDICI\u00d3N: ${2:...}\n		@PAR\u00c1METROS:\n				* ${3:nombreDelPar\u00e1metro} : ${4:Tipo} - ${5:descripci\u00f3n}\n	*/\n\n# docs (funci\u00f3n)\nsnippet docs (funci\u00f3n)\n	/*\n		@PROP\u00d3SITO: ${1:...}\n		@PRECONDICI\u00d3N: ${2:...}\n		@TIPO: ${3:...}\n	*/\n\n# docs (funci\u00f3n con par\u00e1metros)\nsnippet docs (funci\u00f3n con par\u00e1metros)\n	/*\n		@PROP\u00d3SITO: ${1:...}\n		@PRECONDICI\u00d3N: ${2:...}\n		@PAR\u00c1METROS:\n				* ${3:nombreDelPar\u00e1metro} : ${4:Tipo} - ${5:descripci\u00f3n}\n		@TIPO: ${6:...}\n	*/\n'}),define("ace/snippets/gobstones",["require","exports","module","ace/snippets/gobstones.snippets"],function(e,t,n){"use strict";t.snippetText=e("./gobstones.snippets"),t.scope="gobstones"});                (function() {
                    window.require(["ace/snippets/gobstones"], function(m) {
                        if (typeof module == "object" && typeof exports == "object" && module) {
                            module.exports = m;
                        }
                    });
                })();
            