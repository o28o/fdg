from aksharamukha import transliterate
import sys

argsList = sys.argv
del argsList[0]
thaiInp = ' '.join(argsList)
def ThaiToIAST(thaiInp):
  #print(thaiInp)
  iastOut = transliterate.process('autodetect', 'IAST',thaiInp)
  print(iastOut)
  #return iastOut
  
ThaiToIAST(thaiInp)