import java.util.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
class Student
{
	int roll;
	String sub;
	int marks ;
	Student(int roll, String str , int marks)
    {
		this.roll = roll;
		this.sub = str;
		this.marks = marks;
	}
}
public class Main 
{
	public static void main(String[] args) 
    {
		Scanner sc  = new Scanner(System.in);
		System.out.println("Enter the number of student : ");
		int n = sc.nextInt();
		ArrayList<Student> list  = new ArrayList<Student>();
		Set<Integer> list1  = new TreeSet<Integer>();
		while(n-->0)
        {
		    System.out.println("Enetr student rollno: ");
			int roll = sc.nextInt();
			System.out.println("Enetr student subject:");
			String sub = sc.next();
			System.out.println("Enetr student marks: ");
			int marks = sc.nextInt();
			Student stud = new Student(roll, sub, marks);
			list.add(stud);
			list1.add(stud.roll);
		}
		
		System.out.println("Roll----------------------subject---------------------marks ");
		for(int num : list1)
        {
			for(int j=0;j<list.size();j++)
            {
				if(num==(list.get(j).roll))
                {
					System.out.println(list.get(j).roll+"---------------"+list.get(j).sub+"--------------"+list.get(j).marks);
					break;
				}
			}
		}
	}
}
