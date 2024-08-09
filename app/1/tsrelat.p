
def input  parameter vlcentrada as longchar.
def input param vtmp       as char.

def var vlcsaida   as longchar.
def var vsaida as char.

def var lokjson as log.
def var hentrada as handle.
def var hsaida   as handle.
def temp-table ttentrada no-undo serialize-name "entrada"
    field progcod   as char
    field usercod   as char.

def temp-table tttsrelat  no-undo serialize-name "relatorios"
    field IDRelat   as int64
    field usercod   as char    
    field dtinclu   as date format "99/99/9999"
    field hrinclu   as char
    field progcod   as char
    field relatnom  as char
    field nomerel  as char
    field nomeArquivo  as char
    field REMOTE_ADDR as char
    field parametrosJSON as char serialize-name "parametros"
    field dtproc  as date serialize-hidden
    field hrproc  as date serialize-hidden
    index data dtproc desc hrproc desc.

    
 
hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY").
find first ttentrada.

def var lcjsonentrada as longchar.
for each tsrelat where tsrelat.progcod = ttentrada.progcod 
                       no-lock.
    if ttentrada.usercod <> ?
    then if ttentrada.usercod <> tsrelat.usercod
         then next.
         
    create tttsrelat.
    tttsrelat.idRelat  = tsrelat.idRelat. 
    tttsrelat.progcod  = tsrelat.progcod.
    tttsrelat.usercod  = tsrelat.usercod.
    tttsrelat.relatnom = tsrelat.relatnom.
    tttsrelat.nomerel = tsrelat.nomerel.
    tttsrelat.dtinclu  = tsrelat.dtinclu.
    tttsrelat.hrinclu  = string(tsrelat.hrinclu,"HH:MM:SS").
    tttsrelat.REMOTE_ADDR = tsrelat.REMOTE_ADDR.
    tttsrelat.nomeArquivo = tsrelat.nomeArquivo.
    copy-lob FROM tsrelat.parametrosJSON to lcjsonentrada.
    tttsrelat.parametrosJSON = lcjsonentrada.

    tttsrelat.dtproc = tsrelat.dtproc.
    if tsrelat.dtproc = ? 
    then tttsrelat.hrproc = 99999.
    else tttsrelat.hrproc = tsrelat.hrproc.
    

end.

hsaida  = temp-table tttsrelat:handle.

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