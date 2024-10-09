<?php

namespace HadiAghandeh\FriendlyId\Encoders;

use HadiAghandeh\FriendlyId\Interfaces\Encoder;

class WordsEncoder implements Encoder
{

    public $words = [
        "an", "as", "at", "by", "be", "do", "go", "he", "if", "in", "is", "it", "me", "my", "no", "of", "on", "or", "so",
        "to", "up", "we", "us", "hi", "oh", "ah", "ok", "ye", "ex", "ox", "pi", "pa", "ma", "ad", "id", "ho", "ha", "ow",
        "aw", "yo", "ya", "uh", "re", "de", "la", "en", "el",
        "ace", "act", "add", "aim", "ale", "all", "amp", "ape", "apt", "arc", "arm", "art", "ash", "ask", "asp", "bat",
        "bay", "bee", "beg", "bet", "bin", "bog", "bow", "bud", "bug", "cab", "cap", "car", "cat", "cow", "cub", "cut",
        "dam", "day", "dew", "die", "dig", "dim", "dip", "dot", "dry", "dub", "due", "dug", "eel", "egg", "elf", "elk",
        "elm", "emu", "end", "era", "fan", "far", "fat", "fin", "fit", "fix", "fog", "for", "fox", "fun", "gap", "gas",
        "get", "gig", "got", "gun", "gut", "hat", "hem", "hen", "hip", "hit", "hot", "hug", "hum", "hut", "ice", "ink",
        "jam", "jaw", "jet", "jig", "job", "joy", "key", "kid", "kit", "lab", "lag", "lap", "lay", "leg", "let", "log",
        "lot", "low", "mad", "man", "map", "mat", "max", "mix", "mud", "mug", "net", "new", "now", "nut", "odd", "old",
        "owl", "pad", "pan", "pat", "paw", "pen", "pet", "pin", "pit", "pop", "pot", "pro", "pub", "rag", "ram", "ran",
        "rat", "red", "rib", "rid", "rim", "rod", "row", "rub", "run", "sad", "saw", "say", "sea", "see", "set", "sip",
        "sit", "six", "sky", "son", "sum", "sun", "tan", "tap", "tax", "tea", "ten", "tie", "tip", "top", "toy", "tub",
        "two", "use", "van", "vat", "vet", "wag", "war", "was", "way", "web", "wet", "win", "wit", "won", "wow", "yak",
        "yes", "yet", "zip", "zoo",
        "and", "ant", "bat", "bed", "bet", "bit", "boy", "car", "cat", "dog", "ear", "eat", "far", "fan", "fat", "get",
        "got", "hat", "hit", "hot", "ice", "ink", "jet", "joy", "key", "lay", "let", "man", "map", "mat", "mix", "net",
        "new", "not", "now", "pan", "pat", "pen", "pet", "pit", "pop", "put", "run", "rat", "red", "say", "see", "set",
        "sit", "sun", "tap", "top", "tip", "toy", "use", "wet", "win", "yet", "zip", "fun", "big", "bee", "ask", "buy",
        "cut", "can", "box", "cub", "day", "den", "dip", "dot", "fix", "fly", "gas", "gym", "her", "him", "his", "hug",
        "jam", "job", "log", "leg", "lip", "nap", "nod", "out", "own", "pad", "paw", "pig", "rub", "row", "run", "sad",
        "sit", "sin", "son", "sum", "tan", "tin", "try", "van", "vet", "war", "who", "why", "win", "yep",
        "able", "also", "area", "baby", "back", "ball", "band", "bank", "base", "bear", "beat", "been", "beer", "bell",
        "best", "bill", "bird", "blow", "blue", "boat", "body", "bomb", "bond", "bone", "book", "boom", "born", "boss",
        "both", "bowl", "bulk", "burn", "bush", "busy", "call", "calm", "camp", "card", "care", "case", "cash", "cast",
        "cell", "chat", "chip", "city", "club", "coal", "coat", "code", "cold", "come", "cook", "cool", "copy", "cost",
        "crew", "crop", "dark", "date", "dawn", "deal", "dean", "dear", "debt", "deep", "deny", "desk", "dial", "diet",
        "dirt", "dish", "disk", "door", "draw", "drop", "drug", "dual", "dust", "duty", "earn", "east", "easy", "edge",
        "else", "even", "ever", "exit", "face", "fact", "fair", "fall", "farm", "fast", "fear", "feel", "feet", "fell",
        "file", "fill", "film", "find", "fire", "firm", "fish", "flat", "flow", "food", "foot", "form", "fort", "free",
        "from", "fuel", "full", "fund", "game", "gate", "gear", "gift", "girl", "give", "glad", "goal", "goes", "gold",
        "golf", "gone", "good", "gray", "grew", "grow", "gulf", "hair", "half", "hall", "hand", "hang", "hard", "harm",
        "hate", "have", "head", "hear", "heat", "help", "hero", "hide", "high", "hill", "hire", "hold", "hole", "holy",
        "home", "hope", "host", "hour", "huge", "hunt", "hurt", "idea", "inch", "into", "iron", "item", "jack", "jazz",
        "join", "jump", "just", "keep", "kick", "kill", "kind", "king", "knee", "knew", "know", "lack", "lady", "lake",
        "lamp", "land", "last", "late", "lead", "left", "less", "life", "lift", "like", "line", "link", "list", "live",
        "load", "loan", "lock", "long", "look", "lose", "lost", "love", "luck", "made", "main", "make", "many", "mark",
        "mass", "meal", "mean", "meat", "meet", "menu", "mile", "milk", "mind", "mine", "miss", "moon", "more", "most",
        "move", "much", "must", "name", "near", "neck", "need", "news", "next", "nice", "note", "okay", "once", "only",
        "open", "over", "pace", "pack", "page", "pain", "pair", "park", "part", "pass", "past", "path", "peak", "pick",
        "pile", "plan", "play", "plot", "plus", "pool", "poor", "port", "post", "pull", "pure", "push", "race", "rail",
        "rain", "rank", "rare", "rate", "read", "real", "rear", "rent", "rest", "rich", "ride", "ring", "rise", "risk",
        "road", "rock", "role", "roll", "roof", "room", "root", "rope", "rose", "rule", "rush", "safe", "said", "sake",
        "sale", "salt", "same", "sand", "save", "seat", "seed", "seek", "seem", "seen", "self", "sell", "send", "ship",
        "shop", "show", "shut", "sick", "side", "sign", "site", "size", "skin", "slip", "slow", "snow", "soft", "soil",
        "sold", "sole", "some", "song", "soon", "sort", "soul", "spot", "star", "stay", "step", "stop", "such", "suit",
        "sure", "take", "talk", "tall", "tank", "tape", "task", "team", "tear", "tell", "tend", "term", "test", "text",
        "than", "that", "them", "then", "they", "thin", "this", "till", "time", "tiny", "told", "toll", "tone", "took",
        "tool", "tour", "town", "trap", "tree", "trip", "true", "tune", "turn", "type", "unit", "upon", "user", "vary",
        "vast", "very", "view", "vote", "wait", "walk", "wall", "want", "warm", "warn", "wash", "wave", "wear", "week",
        "well", "west", "what", "when", "whom", "wide", "wife", "wild", "will", "wind", "wine", "wing", "wire", "wise",
        "wish", "wood", "word", "wore", "work", "yard", "year", "your", "zero", "zone",
        "able", "acid", "aged", "ally", "area", "army", "aunt", "baby", "back", "ball", "band", "bank", "base", "bear",
        "beat", "been", "belt", "bend", "bent", "bird", "blow", "blue", "boat", "body", "bomb", "bone", "book", "boot",
        "born", "boss", "bowl", "bulk", "bush", "busy", "call", "calm", "camp", "card", "care", "case", "cash", "cast",
        "cell", "chat", "chip", "club", "coat", "code", "cold", "come", "cool", "cost", "crop", "dark", "date", "deal",
        "dear", "deep", "desk", "dial", "dirt", "dish", "door", "drew", "drop", "drug", "dual", "dust", "duty", "earn",
        "east", "easy", "edge", "else", "even", "ever", "exit", "face", "fact", "fail", "fall", "farm", "fast", "fear",
        "feed", "feel", "feet", "file", "fill", "film", "find", "fire", "firm", "fish", "flat", "food", "foot", "form",
        "free", "frog", "from", "fuel", "full", "fund", "game", "gift", "girl", "give", "goal", "goes", "gold", "golf",
        "gone", "good", "gray", "grew", "grow", "gulf", "hair", "half", "hall", "hand", "hang", "hard", "harm", "hate",
        "head", "hear", "heat", "help", "hero", "hide", "high", "hill", "hire", "hold", "hole", "home", "hope", "host",
        "huge", "hunt", "hurt", "idea", "inch", "iron", "item", "join", "jump", "just", "keep", "kick", "kill", "kind",
        "king", "knee", "know", "lack", "lady", "lake", "lamp", "land", "last", "late", "lead", "leaf", "left", "less",
        "life", "lift", "like", "list", "live", "load", "loan", "lock", "long", "look", "lost", "love", "luck", "made",
        "main", "make", "many", "mark", "mass", "meal", "mean", "meat", "meet", "mile", "milk", "mind", "mine", "miss",
        "moon", "more", "most", "move", "much", "name", "near", "neck", "need", "news", "next", "nice", "note", "okay",
        "open", "pack", "page", "pain", "pair", "park", "part", "pass", "path", "peak", "pick", "plan", "play", "plus",
        "pool", "poor", "port", "post", "pull", "pure", "push", "race", "rain", "rank", "rate", "read", "real", "rent",
        "rest", "rich", "ride", "ring", "rise", "risk", "road", "rock", "role", "roll", "roof", "room", "root", "rope",
        "rose", "rule", "rush", "safe", "salt", "sand", "save", "seat", "seek", "seen", "self", "sell", "ship", "shop",
        "show", "shut", "sick", "side", "sign", "site", "size", "skin", "slip", "slow", "snow", "soft", "soil", "sold",
        "sole", "some", "song", "soon", "sort", "spot", "star", "stay", "step", "stop", "such", "suit", "sure", "take",
        "talk", "tall", "task", "team", "tear", "tell", "tend", "term", "test", "text", "than", "that", "them", "then",
        "they", "thin", "this", "time", "tiny", "told", "tool", "town", "trip", "true", "tune", "turn", "type", "unit",
        "upon", "user", "view", "vote", "wait", "walk", "want", "warm", "wash", "wave", "wear", "week", "well", "west",
        "what", "when", "wide", "wife", "wild", "will", "wind", "wine", "wing", "wise", "wish", "wood", "word", "work",
        "yard", "year", "your", "zero", "zone"
    ];

    public function encode(int $num): string
    {
        $base = count($this->words);
        $encoded_words = [];

        // Handle 0 case
        if ($num == 0) {
            return $this->words[0];
        }

        // Convert the number into base-N representation
        $currentWord = null;
        while ($num > 0) {
            $remainder = $num % $base;
            $words = $this->shuffleWords($currentWord ?? 0);
            $currentWord = $words[$remainder];
            array_push($encoded_words, $currentWord);
            $num = intval($num / $base); // Integer division
        }

        // Reverse the array since we collect remainders from least to most significant
        return implode('-', array_reverse($encoded_words));
    }

    public function decode(string $encoded): int
    {
        $base = count($this->words);

        // Split the encoded string into words
        $encodedWords = explode('-', $encoded);
        $decoded_num = 0;

        // Loop through the words in the encoded string
        $loop = 0;
        foreach ($encodedWords as $word) {
            // Shuffle the words based on the currentWord's seed
            $seed = $encodedWords[++$loop] ?? 0;
            $shuffledWords = $this->shuffleWords($seed);
            // Find the index of the current word in the shuffled array
            $index = array_search($word, $shuffledWords);
            // Update the decoded number
            $decoded_num = $decoded_num * $base + $index;
            // Update the currentWord to the current word in the loop
        }

        return $decoded_num;
    }


    function shuffleWords(string $word) {
        $seed = $this->getAsciiValue($word);

        $array = $this->words;

        // Seed the Mersenne Twister random number generator
        mt_srand($seed);

        // Get the length of the array
        $length = count($array);

        // Perform a custom shuffle using Fisher-Yates
        for ($i = $length - 1; $i > 0; $i--) {
            // Generate a random index using mt_rand
            $j = mt_rand(0, $i);

            // Swap the elements
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }

        // Reset the Mersenne Twister random number generator to its default behavior
        mt_srand();

        // Return the shuffled array
        return $array;
    }

    function getAsciiValue($word) : int {
        $ascii_values = [];

        // Loop through each character in the word
        for ($i = 0; $i < strlen($word); $i++) {
            // Get the ASCII value of the character
            $ascii_values[] = ord($word[$i]);
        }

        return array_sum($ascii_values);
    }

    public function __construct()
    {
        $this->words = array_values(array_unique($this->words));
    }

    public function isWord(): bool
    {
        return true;
    }
}