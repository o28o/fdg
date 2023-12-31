(function() {

var prefix = 'Navigation'

var separator = '/';

var linkSpecs = {
  'suttas': ['Suttas', '/suttas/index.html'],
  'DN': ['DN', '/suttas/DN/'],
  'MN': ['MN', '/suttas/MN/'],
  'SN': ['SN', '/suttas/SN/'],
  'AN': ['AN', '/suttas/AN/'],
  'KN': ['KN', '/suttas/KN/'],
  'Dhp': ['Dhp', '/suttas/KN/Dhp/'],
  'Khp': ['Khp', '/suttas/KN/Khp/'],
  'Ud': ['Ud', '/suttas/KN/Ud/'],
  'Iti': ['Iti', '/suttas/KN/Iti/'],
  'StNp': ['Sn', '/suttas/KN/StNp/'],
  'Thag': ['Thag', '/suttas/KN/Thag/'],
  'Thig': ['Thig', '/suttas/KN/Thig/'],
  'books': ['Books', '/ebook_index.html'],
  'vinaya': ['Vinaya', '/ebook_index.html#vinaya'],
  'bmc': ['BMC', '/vinaya/bmc/Section0000.html'],
  'uncollected': ['Misc Essays', '/uncollected_essays_index.html'],
  'QuestionofBhikkhuniOrdination': ['Bhikkhuni Ordination', '/books/QuestionofBhikkhuniOrdination/Contents.html'],
  'FactorsforAwakening': ['Factors for Awakening', '/books/FactorsforAwakening/Contents.html'],
  'NibbanaDescription': ['Talking about Nirvana', '/books/uncollected/NibbanaDescription.html'],
  'HappinessSkill': ['Happiness as a Skill', '/books/uncollected/Happiness_as_a_Skill.html'],
  'SelvesNot-self': ['Selves Not-Self', '/books/SelvesNot-self/Contents.html'],
  'WithEachAndEveryBreath': ['With Each &amp; Every Breath', '/books/WithEachAndEveryBreath/Contents.html'],
  'Wings': ['Wings to Awakening', '/books/Wings/Section0000.html'],
  'TruthOfRebirth': ['Truth of Rebirth', '/books/TruthOfRebirth/Contents.html'],
  'ShapeOfSuffering': ['Shape of Suffering', '/books/ShapeOfSuffering/Contents.html'],
  'OnThePath': ['On the Path', '/books/OnThePath/Section0000.html'],
  'MindLikeFire': ['Mind Like Fire', '/books/MindLikeFire/Section0000.html'],
  'StartingOutSmall': ['Starting Out Small', '/books/StartingOutSmall/Section0000.html'],
  'KarmaQ&A': ['Karma Q & A', '/books/KarmaQ&A/Section0000.html'],
  'BuddhasTeachings': ['Buddha’s Teachings', '/books/BuddhasTeachings/Section0000.html'],
  'IntoTheStream': ['Into the Stream', '/books/IntoTheStream/Contents.html'],
  'BeyondCoping': ['Beyond Coping', '/books/BeyondCoping/Contents.html'],
  'Non-violence': ['Non-violence', '/books/Non-violence/Contents.html'],
  'BuddhasTeachings': ['Buddha’s Teachings', '/books/BuddhasTeachings/Section0000.html'],
  'Noble&True': ['Noble & True', '/books/Noble&True/Section0000.html'],
  'BeyondAllDirections': ['Beyond All Directions', '/books/BeyondAllDirections/Section0000.html'],
  'Head&HeartTogether': ['Head & Heart', '/books/Head&HeartTogether/Section0000.html'],
  'PurityOfHeart': ['Purity of Heart', '/books/PurityOfHeart/Section0000.html'],
  'KarmaOfQuestions': ['Karma of Questions', '/books/KarmaOfQuestions/Section0000.html'],
  'NobleStrategy': ['Noble Strategy', '/books/NobleStrategy/Section0000.html'],
  'ePubDhammaTalks_v3': ['ePublished v3', '/books/ePubDhammaTalks_v3/Section0000.html'],
  'ePubDhammaTalks_v2': ['ePublished v2', '/books/ePubDhammaTalks_v2/Section0000.html'],
  'ePubDhammaTalks_v1': ['ePublished v1', '/books/ePubDhammaTalks_v1/Section0000.html'],
  'Elephant\'sFootprint': ['Elephant’s Footprint', '/books/Elephant\'sFootprint/Section0000.html'],
  'NobleEightfoldPath': ['Noble Eightfold Path', '/books/NobleEightfoldPath/Section0000.html'],
  'Mindfulness_to_theFore': ['Mindfulness to the Fore', '/books/uncollected/Mindfulness_to_theFore.html'],
  'Fun_andGames': ['Fun & Games', '/books/uncollected/Fun_andGames.html'],
};

var removeEmpty = function(arr) {
  return arr.filter(function(item) {
    return item != undefined && item != '';
  });
}

var getSuttasIndex = function() {
  return '/suttas/index.html';
}

var getCurrentPage = function() {
  return window.location.pathname;
}

var getPathParts = function(path) {
  var parts = path.replace('.html', '').split('/');
  return removeEmpty(parts);
}

var getMainHeadings = function() {
  title = $('h1');

  if (title.length == 0)
    title = $('h2');

  if (title.length == 0)
    title = $('h3');

  if (title.length == 0)
    return null;

  return title;
}

var getMainHeading = function() {
  title = $('h1');

  if (title.length != 1)
    title = $('h2');

  if (title.length != 1)
    title = $('h3');

  if (title.length != 1)
    return null;

  return title.first();
}

var prettifyName = function(name) {
  if (name.includes('intro'))
    return 'Introduction';

  if (name.includes('prolog'))
    return 'Prologue';

  if (name.includes('epilog'))
    return 'Epilogue';

  if (name.includes('appen'))
    return name.replace(/app(.+)/, 'Appendix $1');

  if (getCurrentPage().includes('/suttas')) {
    name = name.replace('_', ':')
               .replace(/([A-Za-z]+)0*([0-9:]+)/, '$2');
  } else {
    name = name.replace('_', ' ');
  }


  if (!getCurrentPage().includes('/suttas')) {
    name = name.replace(/([A-Z])/g, ' $1').trim();

    if (/^(Section)?\d+$/.test(name)) {
      title = getMainHeadings();

      if (!title || title.length > 1)
        name = '...';
      else
        name = title.text();
    }
  }


  return name;
}

var getLinkSpec = function(partName) {
  if (partName in linkSpecs) {
    return linkSpecs[partName];
  } else {
    if (partName.startsWith('index')) {
      return null;
    } else {
      if (!getCurrentPage().includes('suttas/')) {
        if (!partName.includes('Section') && !partName.includes('Cover')) {
          toc = $('img[title="table of contents"]');

          if (toc.length == 0)
            toc = $('img[title="Table of Contents"]');

          tocHref = toc.closest('a').attr('href');

          return [prettifyName(partName), tocHref];
        } else {
          return [prettifyName(partName), getCurrentPage()];
        }
      } else {
        return [prettifyName(partName), getCurrentPage()];
      }
    }
  }
}

var getAnchorTag = function(linkSpec) {
  if (linkSpec == null)
    return;

  var name = linkSpec[0];
  var url = linkSpec[1];
  return '<a href="' + url + '">' + name + '</a>';
}

$(document).ready(function() {
  var currentPage = getCurrentPage();
  var parts = getPathParts(currentPage);
  var links = removeEmpty(parts.map(getLinkSpec).map(getAnchorTag));

  for (i = 0; i < links.length; i++) {
    if (i == links.length - 1)
      links[i] = '<span class="current">' + links[i] + '</span>';
    else
      links[i] = '<span>' + links[i] + '</span>';
  }

  var html = '<div class="breadcrumbs"><span class="prefix">'
             + prefix
             + '</span>'
             + links.join('<span class="separator">' + separator + '</span>')
             + '</div>';

  if (currentPage != '/suttas/index.html' &&
       currentPage != '/suttas/index_mobile.html' &&
       $('#titlepage').length == 0) {
    h = getMainHeading();

    if (h)
      h.after(html);
    else
      $('#content').prepend(html);
  }
})
})()
