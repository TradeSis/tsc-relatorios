
def input  parameter vlcentrada as longchar.
def input param vtmp       as char.

def var vlcsaida   as longchar.
def var vsaida as char.

def var lokjson as log.
def var hentrada as handle.
def var hsaida   as handle.

def temp-table ttentrada no-undo serialize-name "tsrelagend"
    field usercod     as CHAR
    field REMOTE_ADDR     as CHAR
    field dtprocessar as DATE
    field hrprocessar as INT
    field progcod as char
    field nomeRel as CHAR
    field parametrosJSON as CHAR
    field periodicidade as CHAR
    field periododias as INT
    field diadomes1 as INT
    field diadomes2 as INT
    field diasemana1 as INT
    field diasemana2 as INT
    field diasemana3 as INT.  

def temp-table tttsrelagend  no-undo serialize-name "relatorios"
    field usercod     as CHAR
    field REMOTE_ADDR     as CHAR
    field dtprocessar as DATE
    field hrprocessar as INT
    field progcod as char
    field nomeRel as CHAR
    field parametrosJSON as CHAR
    field periodicidade as CHAR
    field periododias as INT
    field diadomes1 as INT
    field diadomes2 as INT
    field diasemana1 as INT
    field diasemana2 as INT
    field diasemana3 as INT.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.
   

hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY").
find first ttentrada no-error.
if not avail ttentrada
then do:
    create ttsaida.
    ttsaida.tstatus = 500.
    ttsaida.descricaoStatus = "Sem dados de Entrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

def var lcjsonentrada as longchar.
lcjsonentrada =  ttentrada.parametrosJSON.

do transaction:    
    create tsrelagend.
    tsrelagend.usercod = ttentrada.usercod.
    tsrelagend.REMOTE_ADDR = ttentrada.REMOTE_ADDR.
    tsrelagend.dtprocessar  = ttentrada.dtprocessar.
    tsrelagend.hrprocessar  = ttentrada.hrprocessar.
    tsrelagend.progcod  = ttentrada.progcod.
    tsrelagend.nomeRel  = ttentrada.nomeRel.
    tsrelagend.nomeRel = tsrelagend.nomeRel.
    tsrelagend.periodicidade = ttentrada.periodicidade.
    tsrelagend.periododias = ttentrada.periododias.
    tsrelagend.diadomes1 = ttentrada.diadomes1.
    tsrelagend.diadomes2 = ttentrada.diadomes2.
    tsrelagend.diasemana1 = ttentrada.diasemana1.
    tsrelagend.diasemana2 = ttentrada.diasemana2.
    tsrelagend.diasemana3 = ttentrada.diasemana3.
     
    copy-lob FROM lcjsonentrada to tsrelagend.parametrosJSON .
end.

    create tttsrelagend.
    tttsrelagend.usercod = ttentrada.usercod.
    tttsrelagend.REMOTE_ADDR = ttentrada.REMOTE_ADDR.
    tttsrelagend.dtprocessar  = tsrelagend.dtprocessar. 
    tttsrelagend.hrprocessar  = tsrelagend.hrprocessar.
    tttsrelagend.progcod  = tsrelagend.progcod.
    tttsrelagend.nomeRel = tsrelagend.nomeRel.
    tttsrelagend.periodicidade = ttentrada.periodicidade.
    tttsrelagend.periododias = ttentrada.periododias.
    tttsrelagend.diadomes1 = ttentrada.diadomes1.
    tttsrelagend.diadomes2 = ttentrada.diadomes2.
    tttsrelagend.diasemana1 = ttentrada.diasemana1.
    tttsrelagend.diasemana2 = ttentrada.diasemana2.
    tttsrelagend.diasemana3 = ttentrada.diasemana3. 
    tttsrelagend.parametrosJSON = lcjsonentrada.
    
hsaida  = temp-table tttsrelagend:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).

put unformatted string(vlcSaida).


