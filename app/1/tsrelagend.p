
def input  parameter vlcentrada as longchar.
def input param vtmp       as char.

def var vlcsaida   as longchar.
def var vsaida as char.

def var lokjson as log.
def var hentrada as handle.
def var hsaida   as handle.
def temp-table ttentrada no-undo serialize-name "entrada"
    field progcod   as char.

def temp-table tttsrelagend  no-undo serialize-name "relatorios"
        field usercod         as CHAR
        field REMOTE_ADDR     as CHAR
        field dtprocessar as date format "99/99/9999"
        field hrprocessar as char
        field progcod     as char
        field nomeRel     as CHAR
        field periodicidade as char
        field periododias   as int
        field diadomes1     as int
        field diadomes2     as int
        field diasemana1    as int    
        field diasemana2    as int
        field diasemana3    as int
        field parametrosJSON as char serialize-name "parametros"
    index data dtprocessar asc hrprocessar asc.

    
 
hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY").
find first ttentrada.

def var lcjsonentrada as longchar.
for each tsrelagend where tsrelagend.progcod = ttentrada.progcod 
                       no-lock.
    
         
    create tttsrelagend.
        tttsrelagend.usercod = tsrelagend.usercod.
        tttsrelagend.REMOTE_ADDR = tsrelagend.REMOTE_ADDR.
        tttsrelagend.dtprocessar = tsrelagend.dtprocessar.
        tttsrelagend.hrprocessar = string(tsrelagend.hrprocessar,"HH:MM").
        tttsrelagend.progcod = tsrelagend.progcod.
        tttsrelagend.nomeRel = tsrelagend.nomeRel.
        tttsrelagend.periodicidade = tsrelagend.periodicidade.
        tttsrelagend.periododias = tsrelagend.periododias.
        tttsrelagend.diadomes1 = tsrelagend.diadomes1.
        tttsrelagend.diadomes2 = tsrelagend.diadomes2.
        tttsrelagend.diasemana1 = tsrelagend.diasemana1.
        tttsrelagend.diasemana2 = tsrelagend.diasemana2.
        tttsrelagend.diasemana3 = tsrelagend.diasemana3.
        copy-lob FROM tsrelagend.parametrosJSON to lcjsonentrada.
        tttsrelagend.parametrosJSON = lcjsonentrada.
    

end.

hsaida  = temp-table tttsrelagend:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).

DEF VAR vMEMPTR AS MEMPTR  NO-UNDO.

		DEF VAR vloop   AS INT     NO-UNDO.
		if length(vlcsaida) > 30000
		then do:
			COPY-LOB FROM vlcsaida TO vMEMPTR.
			DO vLOOP = 1 TO LENGTH(vlcsaida): 
				put unformatted GET-STRING(vMEMPTR, vLOOP, 1). 
			END.
		end.
		else do:
			put unformatted string(vlcSaida).
		end.  