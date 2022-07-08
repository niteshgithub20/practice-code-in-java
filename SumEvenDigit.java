import java.util.Scanner;
import java.util.*;
public class SumEvenDigit
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,abtakkadigit,sum=0;
        num = sc.nextInt();
        while(num!=0)
        {
            abtakkadigit = num%10;
            if(abtakkadigit%2==0)
            {
                sum = sum+abtakkadigit;
            }
            num = num/10;
        }
        System.out.println("The sum of even digits: "+sum);

    }
}