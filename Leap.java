import java.util.Scanner;
import java.util.*;
public class Leap
{
    public static void main(String[] args){
        Scanner obj = new Scanner(System.in);
        int y = obj.nextInt();
        if((y%4==0 && y%100!=0) || (y%400 == 0))
        {
            System.out.println("True");
        }
        else{
            System.out.println("False");
        }
    }
}