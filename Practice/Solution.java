import java.io.*;
import java.util.*;
import java.util.Scanner;

public class Solution {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        StringBuffer temp1 = new StringBuffer(str);
        StringBuffer temp2 = new StringBuffer(str);
        temp1.reverse();
        if(temp2 == temp1)
        {
            System.out.println("valid");
        }
        else
        {
            System.out.println("invalid");
        }
        
    }
}