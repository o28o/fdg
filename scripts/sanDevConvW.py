import sys
from aksharamukha import transliterate

argsList = sys.argv
del argsList[0]
thaiInp = ' '.join(argsList)
def ThaiToIAST(thaiInp):
  #print(thaiInp) autodetect
  iastOut = transliterate.process('IAST', 'Devanagari',thaiInp)
  print(iastOut)
  #return iastOut
  
ThaiToIAST(thaiInp)

