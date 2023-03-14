import sys
from aksharamukha import transliterate


argsList = sys.argv
del argsList[0]
thaiInp = ' '.join(argsList)
def ThaiToIAST(thaiInp):
  #print(thaiInp)
  iastOut = transliterate.process('autodetect', 'ISOPali',thaiInp)
  print(iastOut)
  #return iastOut
  
ThaiToIAST(thaiInp)

