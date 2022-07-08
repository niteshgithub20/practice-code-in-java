import java.util.*;
import java.util.Scanner;
public class LastDigit
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,abtakkadigit;
        num = sc.nextInt();
        while(num!=0)
        {
            abtakkadigit = num%10;
            System.out.println("The digits of a given number is :"+abtakkadigit);
            num = num/10;
        }
    }
}