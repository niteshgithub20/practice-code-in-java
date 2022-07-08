import java.util.*;
import java.util.Scanner;
public class Palindrom
{
	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int n = sc.nextInt();
        palindrom(n);
     	
		
	}

   public static void palindrom(int n){
        int sum=0,remainder;
        int temp = n;
        while(n>0)
        {
            remainder = n%10;
            sum = (sum*10)+remainder;
            n = n/10;
                       
        }
        if(temp == sum)
        {
            System.out.println("This is a palindrom: " +sum);
        }else{
            System.out.println("This is not a palindrom :" +sum);
        }
    }
}
