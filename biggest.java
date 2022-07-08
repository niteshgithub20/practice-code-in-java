import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.regex.*;

class Result {

   

    public static String biggerIsGreater(String w) {
    // Write your code here
        
        char charArray[] = w.toCharArray();
    int p = charArray.length;
    int endIndex = 0;
        
    for (endIndex = p - 1; endIndex > 0; endIndex--) {
      if (charArray[endIndex] > charArray[endIndex - 1]) {
        break;
      }
    }
        
    if (endIndex == 0) {
      return "no answer";
    } else {
      int firstSmallChar = charArray[endIndex - 1], nextSmallChar = endIndex;

      for (int startIndex = endIndex + 1; startIndex < p; startIndex++) {
        if (
          charArray[startIndex] > firstSmallChar &&
          charArray[startIndex] < charArray[nextSmallChar]
        ) {
          nextSmallChar = startIndex;
        }
      }
        
      swap(charArray, endIndex - 1, nextSmallChar);

      Arrays.sort(charArray, endIndex, p);
    }
    return new String(charArray);

    }
    
    static void swap(char charArray[], int i, int j) {
    char temp = charArray[i];
    charArray[i] = charArray[j];
    charArray[j] = temp;
  }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int T = Integer.parseInt(bufferedReader.readLine().trim());

        for (int itr = 0; itr < T; itr++) {
            String w = bufferedReader.readLine();

            String result = Result.biggerIsGreater(w);

            bufferedWriter.write(result);
            bufferedWriter.newLine();
        }

        bufferedReader.close();
        bufferedWriter.close();
    }
}