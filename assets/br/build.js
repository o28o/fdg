const branch = "published/"; // should end with slash

//github.com/suttacentral/bilara-data/blob/published/root/en/blurb/ud-blurbs_root-en.json

let book = "ud";

//const githubLocation = `https://raw.githubusercontent.com/suttacentral/bilara-data/blob/${branch}root/en/blurb/${book}-blurbs_root-en.json`;
const githubLocation = `/assets/brru/blurbs-ru.json`;

fetch(githubLocation)
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => {
    console.log("something went wrong getting---root---");
    console.log(error);

    console.log(`${githubLocation}`);
  });
